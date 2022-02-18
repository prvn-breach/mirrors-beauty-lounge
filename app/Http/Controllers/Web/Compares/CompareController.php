<?php
namespace App\Http\Controllers\Web\Compares;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Compares\CompareService;
class CompareController extends Controller
{
	function __construct(CompareService $getCompareService){
		$this->getCompareService = $getCompareService;
	}
	public function saveCompare(Request $request){
		return  $this->getCompareService->saveCompare($request);
	}
	public function getCompares(){
		return $this->getCompareService->getCompareBySession();
	}
	public function deleteCompare($id){
		return $this->getCompareService->deleteCompare($id);
	}
	
}