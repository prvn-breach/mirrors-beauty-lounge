<?php
namespace App\Services\Web\Newsletters;

use App\Models\Web\NewsletterSubscriber;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class NewsletterService
{ 
    function __construct(NewsletterSubscriber $newsLetterSubscriber){
		$this->newsLetterSubscriber = $newsLetterSubscriber;
	}

    public function subscribe($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $news_letter = $this->newsLetterSubscriber->subscribe($request);
		return Response::json(['status'=>200,'data'=>$news_letter]);
    }
}