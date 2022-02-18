<?php
namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Orders\OrderService;

class OrderController extends Controller
{
    function __construct(OrderService $orderService){
		$this->orderService = $orderService;
	}

    public function getOrdersCount(Request $request){
        return $this->orderService->getOrdersCount($request);
    }

    public function getOrders(Request $request){
        return $this->orderService->getOrders($request);
    }

    public function getOrder(Request $request){
        return $this->orderService->getOrder($request);
    }

    public function insertOrderFollowUp(Request $request){
        return $this->orderService->insertOrderFollowUp($request);
    }

    public function updateOrder(Request $request){
        return $this->orderService->updateOrder($request);
    }

    public function addOrder(Request $request){
        return $this->orderService->addOrder($request);
    }

    public function getIncompleteOrders(Request $request){
        return $this->orderService->getIncompleteOrders($request);
    }

    public function getComplaints(Request $request){
        return $this->orderService->getComplaints($request);
    }

    public function getCountryReport(Request $request){
        return $this->orderService->getCountryReport($request);
    }

    public function createComplaint(Request $request) {
        return $this->orderService->createComplaint($request);
    }
}