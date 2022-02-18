<?php
namespace App\Models\Admin;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\ExcelResponse;
use App\Models\Web\User;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderUser;
use App\Models\Admin\OrderAddress;
use App\Models\Admin\BillingAddress;
use App\Models\Admin\OrderInvoice;
use App\Models\Admin\OrderPayment;
use App\Models\Admin\OrderDiscount;
use App\Models\Admin\ProductCatlog;
use App\Models\Admin\OrderItemStatus;
use App\Models\Admin\OrderStatusShipping;
use Illuminate\Support\Facades\Mail;
use App\Models\Web\Vat;
use Carbon\Carbon;
use DB;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'session_id' ];

    public $statuses = [
        'N' => 'NEW',
        'V' => 'CONFIRMED',
        'S' => 'SHIPPED',
        'D' => 'DELIVERED',
        'C' => 'CANCELLED',
        'R' => 'RETURNED'
    ];

    public $months = [ 'Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getOrdersCount($request) {
        $orders = collect($this->with(['orderStatusShipping', 'orderPayment', 'orderItem'])->get());
        $products = collect(ProductCatlog::withCount('productStock')->get());

        if (isset($request['created_by'])) {
            $filtered_orders = collect();
            $filtered_products = collect();
            foreach ($orders as $order) {
                foreach ($order['orderItem'] as $item) {
                    if ($item['product']['created_by'] == $request['created_by']) {
                        $filtered_orders->push($order);
                        break;
                    }
                }
            }

            $products = $products->where('created_by', $request['created_by']);

            $orders = $filtered_orders;
        }

        // Last 12 Months Data
        $monthly_count = $this->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereHas('orderStatusShipping', function($query){ $query->where('status', 'D'); });
            
        if (isset($request['created_by'])) {
            $product_ids = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
            $monthly_count = $monthly_count->whereHas('orderItem', function($query) use ($product_ids){
                $query->whereIn('product_id', $product_ids);
            });
        }
            
        $monthly_count = $monthly_count->groupBy(['year', 'month'])->get()->groupBy(['year', 'month']);
        $monthly_data = collect();
        for($i=date('m')+1;$i<=12;$i++) {
            $monthly_data->push([
                'month' => (date('Y')-1).' '.$this->months[$i-1],
                'count' => isset($monthly_count[date('Y')-1][$i][0]['count']) ? $monthly_count[date('Y')-1][$i][0]['count'] : 0
            ]);
        }

        for($i=1;$i<=date('m');$i++) {
            $monthly_data->push([
                'month' => date('Y').' '.$this->months[$i-1],
                'count' => isset($monthly_count[date('Y')][$i][0]['count']) ? $monthly_count[date('Y')][$i][0]['count'] : 0
            ]);
        }

        // Last 10 years data
        $yearly_count = $this->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
            ->whereHas('orderStatusShipping', function($query){ $query->where('status', 'D'); });

        if (isset($request['created_by'])) {
            $product_ids = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
            $yearly_count = $yearly_count->whereHas('orderItem', function($query) use ($product_ids){
                $query->whereIn('product_id', $product_ids);
            });
        }

        $yearly_count = $yearly_count->groupBy('year')->orderBy('year', 'desc')->limit(10)->get()->groupBy('year');
        $yearly_data = collect();
        for ($i=0; $i < 10 ; $i++) { 
            $yearly_data->push([
                'year' => date('Y')-$i,
                'count' => isset($yearly_count[date('Y')-$i][0]['count']) ? $yearly_count[date('Y')-$i][0]['count'] : 0
            ]);
        }

        return [
            'total_orders' => $orders->count(),
            'delivered_orders' => $orders->filter(function($order){ return $order['orderStatusShipping']['status'] == 'D'; })->count(),
            'cancelled_orders' => $orders->filter(function($order){ return $order['orderStatusShipping']['status'] == 'C'; })->count(),
            'pending_orders' => $orders->filter(function($order){ return !in_array($order['orderStatusShipping']['status'], ['D','R','C']); })->count(),
            'total_sales' => $orders->sum('orderPayment.sub_total'),
            'delivered_sales' => $orders->filter(function($order){ return $order['orderStatusShipping']['status'] == 'D'; })->sum('orderPayment.sub_total'),
            'cancelled_sales' => $orders->filter(function($order){ return $order['orderStatusShipping']['status'] == 'C'; })->sum('orderPayment.sub_total'),
            'pending_sales' => $orders->filter(function($order){ return !in_array($order['orderStatusShipping']['status'], ['D','R','C']); })->sum('orderPayment.sub_total'),
            'total_products' => $products->count(),
            'active_products' => $products->filter(function($product){ return $product['status'] == 'A'; })->count(),
            'inactive_products' => $products->filter(function($product){ return $product['status'] == 'I'; })->count(),
            'out_of_stock_products' => $products->filter(function($product){ return $product['product_stock_count'] == 0; })->count(),
            'monthly_data' => $monthly_data,
            'yearly_data' => $yearly_data->sortBy(['year', 'asc'])
        ];
    }
    
    public function getOrders($request) {
        $order = [];
        $per_page = 10;
        if (isset($request['per_page'])) {
            $per_page = $request['per_page'];
        }

        $orders_query = $this->with(['orderAddress', 'billingAddress', 'orderDiscount', 'orderInvoice', 
            'orderItem', 'orderItemStatus', 'orderPayment', 'orderPickupLocation', 
            'orderStatusShipping', 'orderUser', 'orderFollowUp' ]);

        if (isset($request['period']) && $request['period']!='0') {
            if ($request['period'] == 'current_year') {
                $orders_query->whereYear('created_at', date('Y'));
            }
            if ($request['period'] == 'current_month') {
                $orders_query->whereMonth('created_at', date('m'));
            }
            if ($request['period'] == 'current_week') {
                $orders_query->whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
                    ->whereDate('created_at', '<=', Carbon::now()->format('Y-m-d'));
            }
            if ($request['period'] == 'current_day') {
                $orders_query->whereDate('created_at', Carbon::now()->format('Y-m-d'));
            }
        }  

        if (isset($request['period']) && $request['period']=='0' && isset($request['date'])) {
            $dates = explode("-", $request['date']);
            $from_date = $dates[0];
            $to_date = $dates[1];
            $orders_query->whereDate('created_at', '>=', $from_date )->whereDate('created_at', '<=', $to_date);
        }

        if (isset($request['sort_by']) && isset($request['order'])) {
            $orders_query->orderBy($request['sort_by'], $request['order']);
        }

        if (isset($request['date'])) {
            $orders_query->whereDate('created_at', $request['date']);
        }

        if (isset($request['shipping_status'])) {
            $orders_query->whereHas('orderStatusShipping', function ($query) use ($request){
                $query->where('status', $request['shipping_status']);
            });
        }

        
        if (isset($request['created_by'])) {
            $products = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
            $orders_query->whereHas('orderItem', function($query) use ($products){
                $query->whereIn('product_id', $products);
            });
        }


        $orders_query->whereHas('orderPayment', function ($query) use ($request){
            if (isset($request['payment_status'])) {
                $query->where('payment_status', $request['payment_status']);
            }
            if (isset($request['payment_mode'])) {
                $query->where('payment_mode', $request['payment_mode']);
            }
        });

        if (isset($request['search'])) {
            $orders_query->whereHas('orderUser', function ($query) use ($request){
                $query->where('email', 'LIKE', "%{$request['search']}%")
                ->orWhere('name', 'LIKE', "%{$request['search']}%");
            })
            ->orWhere('id', 'LIKE', "%{$request['search']}%")
            ->orWhere('created_at', 'LIKE', "%{$request['search']}%");
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $orders = $orders_query->orderBy('id', 'desc')->get();
            $columns = $request['excel_fields'];
            $rows = [];
            foreach ($orders->toArray() as $order) {
                $order['order_status_shipping']['status'] = $this->statuses[$order['order_status_shipping']['status']];
                $row = [];
                foreach ($request['excel_db_columns'] as $index => $excel) {
                    $row[$index] = null;
                    if (isset($excel['table'])) {
                        $row[$index] = $order[$excel['table']];
                    }

                    if (isset($excel['multiple'])) {
                        if ($row[$index]) {
                            $row[$index] = implode(", ",collect($row[$index])->pluck([$excel['column']])->toArray());
                        }
                        continue;
                    }

                    if (isset($excel['column'])) {
                        $row[$index] = $row[$index] 
                            ? $row[$index][$excel['column']]
                            : $order[$excel['column']];
                    }
                }
                array_push($rows, array_values($row));
            }
            return ExcelResponse::export('Orders', $rows, $columns, 'Orders');
        }

        $orders = $orders_query->orderBy('id', 'desc')->paginate($per_page);
        
        return $orders;
    }

    public function getIncompleteOrders($request) {
        $per_page = 10;
        if (isset($request['per_page'])) {
            $per_page = $request['per_page'];
        }

        $incomplete_orders_query = $this->with(['orderAddress', 'billingAddress', 'orderDiscount', 'orderInvoice', 
            'orderItem', 'orderItemStatus', 'orderPayment', 'orderPickupLocation', 
            'orderStatusShipping', 'orderUser', 'orderFollowUp' ])
            ->whereHas('orderPayment', function ($query){
                $query->where('payment_status', 'NOT_PAID');
            });

        if (isset($request['created_by'])) {
            $products = ProductCatlog::where('created_by', $request['created_by'])->pluck('id');
            $incomplete_orders_query->whereHas('orderItem', function($query) use ($products){
                $query->whereIn('product_id', $products);
            });
        }

        if (isset($request['search'])) {
            $incomplete_orders_query->whereHas('orderUser', function ($query) use ($request){
                $query->where('email', 'LIKE', "%{$request['search']}%")
                    ->orWhere('name', 'LIKE', "%{$request['search']}%");
            })
            ->orWhere('id', 'LIKE', "%{$request['search']}%")
            ->orWhere('created_at', 'LIKE', "%{$request['search']}%");
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $orders = $incomplete_orders_query->orderBy('id', 'desc')->get();
            $columns = $request['excel_fields'];
            $rows = [];
            foreach ($orders->toArray() as $order) {
                $order['order_status_shipping']['status'] = $this->statuses[$order['order_status_shipping']['status']];
                $row = [];
                foreach ($request['excel_db_columns'] as $index => $excel) {
                    $row[$index] = null;
                    if (isset($excel['table'])) {
                        $row[$index] = $order[$excel['table']];
                    }

                    if (isset($excel['multiple'])) {
                        if ($row[$index]) {
                            $row[$index] = implode(", ",collect($row[$index])->pluck([$excel['column']])->toArray());
                        }
                        continue;
                    }

                    if (isset($excel['column'])) {
                        $row[$index] = $row[$index] 
                            ? $row[$index][$excel['column']]
                            : $order[$excel['column']];
                    }
                }
                array_push($rows, array_values($row));
            }
            return ExcelResponse::export('IncompleteOrders', $rows, $columns, 'IncompleteOrders');
        }
        
        $orders = $incomplete_orders_query->orderBy('id', 'desc')->paginate($per_page);

        return $orders;
    }

    public function getComplaints($request) {
        $order = [];
        $per_page = 10;
        if (isset($request['per_page'])) {
            $per_page = $request['per_page'];
        }

        $orders_query = $this->with(['orderAddress', 'billingAddress', 'orderDiscount', 'orderInvoice', 
            'orderItem', 'orderItemStatus', 'orderPayment', 'orderPickupLocation', 'complaints',
            'orderStatusShipping', 'orderUser', 'orderFollowUp' ])->has('complaints');

        if (isset($request['search'])) {
            $orders_query->whereHas('orderUser', function ($query) use ($request){
                $query->where('email', 'LIKE', "%{$request['search']}%")
                ->orWhere('name', 'LIKE', "%{$request['search']}%");
            })->orWhere('id', 'LIKE', "%{$request['search']}%");
        }
        
        $orders = $orders_query->orderBy('id', 'desc')->paginate($per_page);

        // Excel Download
        if (isset($request['response_type'])) {
            $columns = [ 'Order Id', 'Customer Name', 'Customer Email', 'Contact No.', 'Products', 'Complaint Status' ];
            $rows = [];
            foreach ($orders->toArray()['data'] as $order) {
                $product_names = implode(", ", collect($order['order_item'])->pluck('product_name')->toArray());
                array_push($rows, [
                    $order['id'], $order['order_user']['name'], $order['order_user']['email'],
                    $order['order_user']['mobile'], $product_names, $order['order_status_shipping']['complaint_status']
                ]);
            }
            return ExcelResponse::export('Complaints', $rows, $columns, 'Complaints');
        }
        
        return $orders;
    }

    public function getOrder($request) { 
        return $this->with(['orderAddress', 'billingAddress', 'orderDiscount', 'orderInvoice',
            'orderItemStatus', 'orderPayment', 'orderPickupLocation', 'complaints',
            'orderItem', 'orderStatusShipping', 'orderUser', 'orderFollowUp' ])
            ->where('id', $request['order_id'])
            ->first();
    }

    public function addOrder($request) {
        $password = str_replace('-','', $request->get('dob'));
        $hashed_password = Hash::make($password);

        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'name' => $request->get('first_name')." ".$request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'dob' => $request->get('dob'),
            'password' => $hashed_password
        ]);

        // MAIL
        $subject = 'Registration Done';
        $email = $user['email'];
        $user_details = $user;
        $user_details['password'] = $password;

        Mail::send('Register', [
            'user' => $user_details,
        ], function($message) use ($email, $subject){
            $message->to($email);
            $message->subject($subject);
        });
        
        if ($user == null) {
            return [
                'status' => 404,
                'data' => '',
                'message' => 'User not Found.'
            ];
        }

        $order = $this->create([ 'user_id' => $user->id, 'session_id' => $request['session_id'] ]);
        OrderAddress::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'address' => $request['shipping_address'],
            'city' => $request['shipping_city'],
            'postal_code' => $request['shipping_postal_code'],
            'state' => $request['shipping_state'],
            'country' => $request['shipping_country'],
            'mobile' => $request['shipping_mobile'],
            'telephone' => $request['shipping_telephone'],
            'type' => $request['shipping_address_type']
        ]);
        BillingAddress::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'address' => $request['billing_address'],
            'city' => $request['billing_city'],
            'postal_code' => $request['billing_postal_code'],
            'state' => $request['billing_state'],
            'country' => $request['billing_country'],
            'mobile' => $request['billing_mobile'],
            'telephone' => $request['billing_telephone'],
            'type' => $request['billing_address_type']
        ]);

        $sale_price=0;
        $discount_price=0;
        $sub_total=0;
        $original_sub_total=0;
        $cart_items = [];
        foreach ($request['products'] as $index => $product_data) {
            $product = ProductCatlog::where('id', $product_data['product_id'])
                ->where('active', 'Y')->with(['getProductImages', 'getBrand'])->first();

            $product_image = '';
            if (!empty($product['getProductImages'])) {
                $product_image = $product['getProductImages'][0]->image;
            }
            $vat = Vat::first();

            OrderItem::create([
                'product_id' => $product->id,
                'barcode' => $product->barcode,
                'brand_id' => $product->brand_id,
                'category_id' => $product->category_id,
                'product_name' => $product->name,
                'image' => env('MIX_BASE_URL').'public/images/products/'.$product_image,
                'warranty' => $product->warranty,
                'delivery' => $product->delivery,
                'order_id' => $order->id,
                'vat' => $vat->percentage * ($product->discount_price * $request['quantity']),
                'sku' => $product->barcode,
                'original_price' => $product->sale_price * $product_data['quantity'],
                'price' => $product->discount_price * $product_data['quantity'],
                'discount' => 100-(($product->discount_price * $product_data['quantity']) * 100/($product->sale_price * $product_data['quantity'])),
                'quantity' => $product_data['quantity'],
                'active' => 1
            ]);
            OrderItemStatus::create([
                'user_id' => $user->id,
                'order_id' => $order->id,
                'item_id' => $product->id,
                'status' => 'P'
            ]);

            $sale_price+=$product->sale_price;
            $discount_price+=$product->discount_price;
            $original_sub_total+=$product->sale_price * $product_data['quantity'];
            $sub_total+=$product->discount_price * $product_data['quantity'];

            $cart_items[$index] = [
                'product_image' => count($product['getProductImages']) > 0 ? $product['getProductImages'][0] : '',
                'brand' => $product['getBrand'],
                'product_name' => $product['name'],
                'quantity' => $product_data['quantity'],
                'price' => $product->discount_price * $product_data['quantity'],
            ];

            $product->product_quantity-=$product_data['quantity'];
            $product->update();
        }

        OrderDiscount::create([
            'original_price' => $sale_price,
            'discount_type' => 'I',
            'user_id' => $user->id,
            'order_id' => $order->id,
            'discount_price' => $discount_price,
            'discount' => ($discount_price * 100)/ $sale_price,
            'total' => $discount_price + ($vat->percentage * $discount_price),
        ]);
        OrderInvoice::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'invoice' => 'MR'.$order->id + 1
        ]);
        OrderPayment::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'sub_total' => $sub_total,
            'vat' => $vat->percentage * $sub_total,
            'shipping' => 0.00,
            'delivery_charge' => 0.00,
            'original_sub_total' => $original_sub_total,
            'total' => ($sub_total) + ($vat->percentage * $sub_total),
            'payment_mode' => $request['payment_mode'],
            'payment_status' => $request['payment_status']
        ]);
        OrderStatusShipping::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'step' => 1,
            'status' => 'N'
        ]);
        OrderUser::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'name' => $user->name,
            'mobile' => $user->mobile,
            'email' => $user->email
        ]);

        $payment_data = [
            'sub_total'=> $sub_total,
            'vat'=> $vat->percentage * $sub_total,
            'shipping'=>0.00,
            'delivery_charge'=>0.00,
            'payment_mode'=>$request['payment_mode'],
            'total'=>$sub_total + ($vat->percentage * $sub_total)
        ];

        $subject = $order->id;
        $email = $request['email'];

        $url = env('APP_URL').'get-order-details/ae-en/'.$request['session_id'];

        Mail::send('OrderPlaced', [
            'cart_items' => $cart_items,
            'payment_data' => $payment_data,
            'url' => $url,
            'order_id' => $order->id
        ], function($message) use ($email, $subject){
            $message->to($email);
            $message->subject($subject);
        });

        return $this->getOrder(['order_id' => $order->id ]);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class)->with('user');
    }

    public function orderAddress() {
        return $this->hasOne(OrderAddress::class);
    }

    public function billingAddress() {
        return $this->hasOne(BillingAddress::class);
    }

    public function orderDiscount() {
        return $this->hasOne(OrderDiscount::class);
    }

    public function orderInvoice() {
        return $this->hasOne(OrderInvoice::class);
    }

    public function orderItem() {
        return $this->hasMany(OrderItem::class)->with('product');
    }

    public function orderItemStatus() {
        return $this->hasMany(OrderItemStatus::class);
    }

    public function orderPayment() {
        return $this->hasOne(OrderPayment::class);
    }

    public function orderPickupLocation() {
        return $this->hasOne(OrderPickupLocation::class);
    }

    public function orderStatusShipping() {
        return $this->hasOne(OrderStatusShipping::class);
    }

    public function orderUser() {
        return $this->hasOne(OrderUser::class);
    }

    public function orderFollowUp() {
        return $this->hasMany(OrderFollowUp::class);
    }
}