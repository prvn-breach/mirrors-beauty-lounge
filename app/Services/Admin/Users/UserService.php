<?php
namespace App\Services\Admin\Users;

use App\Models\Admin\Admin;
use Helper,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Admin\User;
use App\Helpers\ExcelResponse;
use Carbon\Carbon;
use App\Models\Admin\SellerStoreDetail;
use Illuminate\Support\Facades\Mail;

class UserService
{
	function __construct(Admin $getUser){
		$this->getUser = $getUser;
	}

    public function updateProfile($request) {
        $this->setAuthAdmin();
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string|in:M,F',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()) {
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        if ($this->getUser->getUser($request['id'])['email']!=$request['email']) {
            if (Admin::where('email', $request['email'])->count() > 0) {
                return response()->json(['status'=>0,'data'=>[ 'email' => [ 'The email should be unique.' ] ]], 200);
            }
        }

        $admin = Admin::find($request['id']);

        Admin::where('id', $request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'name' => $request['first_name']." ".$request['last_name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password'])
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        $token = JWTAuth::attempt($credentials);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>0,'error' => 'email or password wrong'], 200);
            }

        } catch (JWTException $e) {
            return response()->json(['status'=>0,'error' => 'could not create token'], 200);
        }

        $status = 1;
        $admin = Admin::where('email', $request['email'])->first();
        return response()->json(compact('status','token', 'admin'));
    }

    public function changePassword($request){
        $this->setAuthAdmin();
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6|max:50|different:OldPassword',
        ]);

        if($validator->fails()){
                return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }
        $user = $this->getUser->getUser($request->id);
        if (Hash::check($request->old_password, $user->password)) { 
            $user->fill([
            'password' => Hash::make($request->password)
            ])->save();
            return response()->json(['status'=>200,'data'=>'Password changed'], 200); 
        } else {
                return response()->json(['status'=>1,'data'=>'Password does not match'], 200);  
        }


        
    }

    public function forgotPassword($request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:admins,email',
            'password' => 'required|string|min:6|confirmed'
        ],[
            'email.exists' => 'Email not registered.',
            'password.confirmed' => 'Passwords not matched.'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        Admin::where('email', $request['email'])->update([ 'password' => Hash::make($request['password']) ]);
        return Response::json([ 'status'=>200,'data'=>'', 'message' => 'Password Updated' ]);
    }

    public function authenticate($request) {
        $this->setAuthAdmin();
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>0,'error' => 'email or password wrong'], 200);
            }
        } catch (JWTException $e) {
            return response()->json(['status'=>0,'error' => 'could not create token'], 200);
        }
        $status = 1;
        $admin = Admin::where('email', $credentials['email'])->first();
        return response()->json(compact('status','token', 'admin'));
    }

    public function register($request) {
        $this->setAuthAdmin();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        $user = Admin::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'name' => $request->get('first_name')." ".$request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'role_id' => $request['role_id'],
            'password' => Hash::make($request->get('password')),
        ]);
        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();            
                $user->assignRole($role_r); //Assigning role to user
            }
        }  
        $status = 1;
        $token = JWTAuth::fromUser($user);
        return response()->json(['status'=>1,'data'=>compact('user','token','status')],201);
    }

    public function sellerRegister($request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'mobile_number' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'store_name' => 'required',
            'store_address' => 'required',
            'store_from' => 'required',
            'po_box_number' => 'required',
            'company_emirates_document_id' => 'required',
            'company_emirates_expiry_date' => 'required',
            'company_trade_license_document_id' => 'required',
            'company_trade_license_expiry_date' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        $user = Admin::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'name' => $request->get('first_name')." ".$request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile_number'),
            'role_id' => 2,
            'password' => Hash::make($request->get('password')),
        ]);

        if ($user){
            SellerStoreDetail::create([
                'admin_id' => $user['id'],
                'store_name' => $request['store_name'],
                'store_address' => $request['store_address'],
                'store_from' => $request['store_from'],
                'po_box_number' => $request['po_box_number'],
                // 'company_emirates_document' => $request['company_emirates_document'],
                'company_emirates_document_id' => $request['company_emirates_document_id'],
                'company_emirates_expiry_date' => $request['company_emirates_expiry_date'],
                // 'company_trade_license_document' => $request['company_trade_license_document'],
                'company_trade_license_document_id' => $request['company_trade_license_document_id'],
                'company_trade_license_expiry_date' => $request['company_trade_license_expiry_date']
            ]);
        }

        $status = 1;
        $token = JWTAuth::fromUser($user);
        return response()->json(['status'=>1,'data'=>compact('user','token','status')],201);
    }

    public function updateSellerProfile($request) {
        $this->setAuthAdmin();
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'mobile_number' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'store_name' => 'required',
            'store_address' => 'required',
            'store_from' => 'required',
            'po_box_number' => 'required',
            'company_emirates_document_id' => 'required',
            'company_emirates_expiry_date' => 'required',
            'company_trade_license_document_id' => 'required',
            'company_trade_license_expiry_date' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        if ($this->getUser->getUser($request['id'])['email']!=$request['email']) {
            if (Admin::where('email', $request['email'])->count() > 0) {
                return response()->json(['status'=>0,'data'=>[ 'email' => [ 'The email should be unique.' ] ]], 200);
            }
        }

        Admin::where('id', $request['id'])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'name' => $request['first_name']." ".$request['last_name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password'])
        ]);

        SellerStoreDetail::where('admin_id', $request['id'])->update([
            'store_name' => $request['store_name'],
            'store_address' => $request['store_address'],
            'store_from' => $request['store_from'],
            'po_box_number' => $request['po_box_number'],
            // 'company_emirates_document' => $request['company_emirates_document'],
            'company_emirates_document_id' => $request['company_emirates_document_id'],
            'company_emirates_expiry_date' => $request['company_emirates_expiry_date'],
            // 'company_trade_license_document' => $request['company_trade_license_document'],
            'company_trade_license_document_id' => $request['company_trade_license_document_id'],
            'company_trade_license_expiry_date' => $request['company_trade_license_expiry_date']
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $token = JWTAuth::attempt($credentials);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>0,'error' => 'email or password wrong'], 200);
            }
        } catch (JWTException $e) {
            return response()->json(['status'=>0,'error' => 'could not create token'], 200);
        }

        $status = 1;
        $admin = Admin::where('email', $request['email'])->first();
        return response()->json(compact('status','token', 'admin'));
    }

    public function getAuthenticatedUser() {
        try {
            $this->setAuthAdmin();
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 200);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        if($user != null){
            $getUser = $this->getUser->getUser($user->id);
            return response()->json(['status'=>200,'data'=>compact('getUser')]);
        }
    }

	public function setAuthAdmin(){
         config()->set( 'auth.defaults.guard', 'admins' );
        \Config::set('jwt.user', 'App\Models\Admin\Admin'); 
        \Config::set('auth.providers.users.model', \App\Models\Admin\Admin::class);
    }

    public function getUsers($request){
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }
        $users = User::with('latestUserActivity');

        if (isset($request['search'])) {
            $users = $users->where('email', 'LIKE', "%{$request['search']}%");
        }

        if ($perPage == 'all') {
            $users = $users->get();
        } else {
            $users = $users->paginate($perPage);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $columns = [ 'ID', 'Created Date', 'Email', 'Name', 'Last Activity' ];
            $rows = [];
            foreach ($users->toArray()['data'] as $user) {
                array_push($rows, [ $user['id'], $user['created_at'], $user['email'], $user['name'], $user['updated_at'] ]);
            }
            $users = ExcelResponse::export('Users', $rows, $columns, 'Users');
        }
        return Response::json(['status'=>200,'data'=>$users]);
    }

    public function getUserDetail($request){
        $user = User::with(['userAddresses', 'orders', 'cart', 'productWishlist', 'userActivity'])
            ->where('id', $request['user_id'])
            ->first();
        return Response::json(['status'=>200,'data'=>$user]);
    }

    public function getCustomerReports($request){
        $users_query = User::Query();

        if (isset($request['search'])){
            $users_query->where('email', 'LIKE', "%{$request['search']}%");
        }

        $users_with_orders = $users_query->withCount('orders')->withSum('userWithPayments', 'total')
            ->whereHas('orders.orderStatusShipping', function($query){
                $query->where('status', 'D');
            })
            ->get();
        $registered_users = [
            '7' => User::whereDate('created_at', '>=', Carbon::now()->subdays(7))->count(),
            '14' => User::whereDate('created_at', '>=', Carbon::now()->subdays(14))->count(),
            '30' => User::whereDate('created_at', '>=', Carbon::now()->subdays(30))->count(),
            '365' => User::whereDate('created_at', '>=', Carbon::now()->subdays(365))->count()
        ];

        if (isset($request['response_type'])) {
            $columns = [];
            $rows = [];
            if (isset($request['tab'])){
                if ($request['tab'] == 'orders_total') {
                    $columns = [ 'Customer Email', 'Orders Total' ];
                    foreach ($users_with_orders as $user) {
                        array_push($rows, [ $user['email'], $user['user_with_payments_sum_total']??0 ]);
                    }
                } else if ($request['tab'] == 'no_of_orders') {
                    $columns = [ 'Customer Email', 'No of Orders' ];
                    foreach ($users_with_orders as $user) {
                        array_push($rows, [ $user['email'], $user['orders_count']??0 ]);
                    }
                } else if ($request['tab'] == 'registered_customers') {
                    $columns = [ 'Period', 'Orders' ];
                    $rows = [
                        [ 'In the last 7 days', $registered_users['7'] ],
                        [ 'In the last 14 days', $registered_users['14'] ],
                        [ 'In the last month', $registered_users['30'] ],
                        [ 'In the last year', $registered_users['365'] ]
                    ];
                } 
            }
            $link = ExcelResponse::export($request['tab'], $rows, $columns, $request['tab']);
            return Response::json(['status'=>200, 'data' => $link]);
        }

        return Response::json(['status'=>200,'data'=>[
            'users_with_orders' => $users_with_orders,
            'registered_users' => $registered_users
        ]]);
    }

    public function getSellers($request) {
        $sellers = $this->getUser->getSellers($request);
        return Response::json([ 'status' => 200, 'data' => $sellers ]);
    }

    public function createCustomer($request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dob' => 'required|date_format:d-m-Y',
            'mobile' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

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
        $token = JWTAuth::fromUser($user);
        return response()->json([ 'status' => 200,'data' => '', 'message' => 'Registration Done' ]);
    }
}
	