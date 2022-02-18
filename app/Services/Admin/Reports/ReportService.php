<?php
namespace App\Services\Admin\Reports;

use App\Models\Admin\ProductCatlog;
use App\Models\Admin\CartItem;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderAddress;
use App\Models\Admin\OrderStatusShipping;
use App\Models\Admin\UserAddress;
use App\Models\Admin\SemExpense;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class ReportService
{ 
    function __construct (
        ProductCatlog $productCatlog, 
        CartItem $cartItem, 
        OrderItem $orderItem, 
        OrderAddress $orderAddress, 
        UserAddress $userAddress,
        SemExpense $semExpense,
        OrderStatusShipping $orderStatusShipping
    ) {
		$this->productCatlog = $productCatlog;
		$this->cartItem = $cartItem;
		$this->orderItem = $orderItem;
		$this->orderAddress = $orderAddress;
		$this->userAddress = $userAddress;
		$this->semExpense = $semExpense;
        $this->orderStatusShipping = $orderStatusShipping;
	}

    public function addSemExpense($request) {
        $validator = Validator::make($request->all(), [
            'from_date' => 'required',
            'to_date' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'type_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $add_sem_expense = $this->semExpense->createSemExpense($request);
		return Response::json(['status'=>200,'data'=>$add_sem_expense]);
    }

    public function getSemExpenses($request) {
        $sem_expenses_data = $this->semExpense->getSemExpenses($request);
		return Response::json(['status'=>200,'data'=>$sem_expenses_data]);
    }

    public function getProductSaleCost($request) {
        $products = $this->productCatlog->getProductSaleCost($request);
		return Response::json(['status'=>200,'data'=>$products]);
    }

    public function getProductInsertReport($request) {
        $products = $this->productCatlog->getproducts($request);
		return Response::json(['status'=>200,'data'=>$products]);
    }

    public function getProductVisits($request) {
        $products = $this->cartItem->getProductVisits($request);
		return Response::json(['status'=>200,'data'=>$products]);
    }

    public function getCategorySales($request) {
        $categories = $this->orderItem->getCategorySales($request);
		return Response::json(['status'=>200,'data'=>$categories]);
    }

    public function getActiveCustomerLocations($request) {
        $locations = $this->orderAddress->getMostActiveCustomerLocations($request);
		return Response::json(['status'=>200,'data'=>$locations]);
    }

    public function getTopCustomersSales($request) {
        $customers = $this->orderItem->getTopCustomersSales($request);
		return Response::json(['status'=>200,'data'=>$customers]);
    }

    public function getOrderStatusReport($request) {
        $statuses = $this->orderStatusShipping->getOrderStatusReport($request);
		return Response::json(['status'=>200,'data'=>$statuses]);
    }
}