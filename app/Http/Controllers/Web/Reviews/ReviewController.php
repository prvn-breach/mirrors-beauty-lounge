<?php
namespace App\Http\Controllers\Web\Reviews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Reviews\ReviewService;
class ReviewController extends Controller
{
	function __construct(ReviewService $getReviewService){
		$this->getReviewService = $getReviewService;
	}

	public function saveReview(Request $request){
		return $this->getReviewService->saveReview($request);
	}
	
}