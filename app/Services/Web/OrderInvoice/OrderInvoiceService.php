<?php
namespace App\Services\Web\OrderInvoice;

use App\Models\Web\Order;
use Illuminate\Support\Str;
use Response,Helper;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class OrderInvoiceService
{
    function __construct(Order $order){
		$this->order = $order;
	}

    public $statuses = [
        'N' => 'NEW',
        'V' => 'CONFIRMED',
        'S' => 'SHIPPED',
        'D' => 'DELIVERED',
        'C' => 'CANCELLED',
        'R' => 'RETURNED'
    ];

    public function exportOrderInvoice($request) {
        $order = Order::where('id', $request['order_id'])->with([
            'getItems', 'getPickupLocation', 'getAddress', 'getDiscount',
            'getInvoice', 'getUser', 'getPayment', 'getStatusShipping',
            'getStatusShippings', 'getComplaints'
        ])->first();
        $html = view('OrderInvoice')->with([ 'order' => $order, 'statuses' => $this->statuses ]);
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'portrait')->setPaper(array(0,0,1000,1000));
        $pdf_storage_path = Storage::disk('pdf_storage')->path('');
        // File::deleteDirectory($pdf_storage_path);
        if (!is_dir($pdf_storage_path)) {
            mkdir($pdf_storage_path, 0777, true);
        }
        $filename = 'OrderInvoice-'.uniqid().'.pdf';
        Storage::disk('pdf_storage')->put($filename, $pdf->output());
        $pdf_link_path = env('APP_URL').'public/pdf/'.$filename;
		return Response::json(['status'=>200,'data'=>$pdf_link_path]);
    }

}