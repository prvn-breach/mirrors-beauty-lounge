<?php
namespace App\Http\Controllers\Web\OrderInvoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\OrderInvoice\OrderInvoiceService;

class OrderInvoiceController extends Controller
{
	function __construct(OrderInvoiceService $orderInvoiceService){
		$this->orderInvoiceService = $orderInvoiceService;
	}

    public function exportOrderInvoice(Request $request) {
        return $this->orderInvoiceService->exportOrderInvoice($request);
    }
}

	