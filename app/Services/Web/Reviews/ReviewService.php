<?php
namespace App\Services\Web\Reviews;
use App\Models\Web\Review;
use Response;
use Helper;

class ReviewService
{
	function __construct(Review $getReview){
		$this->getReview = $getReview;
 	}

 	public function saveReview($request){
 		$getReview = $this->getReview->saveReview($request);
 		return Response::json(['status'=>200,'data'=>$getReview,'message'=>'Successfully saved']);
 	}

 	
 	

}