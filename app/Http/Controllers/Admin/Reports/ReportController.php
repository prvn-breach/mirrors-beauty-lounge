<?php
namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Reports\ReportService;

class ReportController extends Controller
{
    function __construct(ReportService $reportService){
		$this->reportService = $reportService;
	}

    public function addSemExpense(Request $request){
        return $this->reportService->addSemExpense($request);
    }

    public function getSemExpenses(Request $request){
        return $this->reportService->getSemExpenses($request);
    }

    public function getProductSaleCost(Request $request){
        return $this->reportService->getProductSaleCost($request);
    }

    public function getProductInsertReport(Request $request){
        return $this->reportService->getProductInsertReport($request);
    }

    public function getProductVisits(Request $request){
        return $this->reportService->getProductVisits($request);
    }

    public function getCategorySales(Request $request){
        return $this->reportService->getCategorySales($request);
    }

    public function getActiveCustomerLocations(Request $request) {
        return $this->reportService->getActiveCustomerLocations($request);
    }

    public function getTopCustomersSales(Request $request) {
        return $this->reportService->getTopCustomersSales($request);
    }

    public function getOrderStatusReport(Request $request) {
        return $this->reportService->getOrderStatusReport($request);
    }
}