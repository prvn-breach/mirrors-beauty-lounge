<?php
namespace App\Services\Web\Compares;
use App\Models\Web\ProductCompare;
use Helper;
use Response;
class CompareService
{
	function __construct(ProductCompare $getProductCompare){
		$this->getProductCompare = $getProductCompare;
	}
	
	public function saveCompare($request){
		$data = $request->all();
		if(!empty($data)){
			$getData = array(
				'product_id'=>$data['id'],
				'user_id'=>($data['user_id'] != null)?$data['user_id']:'',
				'session_id'=>$data['session_id'],
				'category_id'=>$data['category_id']
			);
			$getProductCompare =  $this->getProductCompare->saveCompare($getData);
			 return Response::json(['status'=>200,'data'=>$getProductCompare,'message'=>'Successfully saved']);
		}
	}
	public function getCompares(){
		$getCompares = $this->getProductCompare->getCompareBySession();
		return Response::json(['status'=>200,'data'=>$getCompares]);
	}
	public function deleteCompare($id){
		$getCompares = $this->getProductCompare->deleteCompare($id);
		return Response::json(['status'=>200,'data'=>$getCompares,'message'=>'Successfully deleted']);
	}


	

	
}