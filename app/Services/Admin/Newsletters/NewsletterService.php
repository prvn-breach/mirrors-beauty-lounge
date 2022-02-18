<?php
namespace App\Services\Admin\Newsletters;

use App\Models\Admin\NewsletterSubscriber;
use Illuminate\Support\Str;
use Response;
use Helper;

class NewsletterService
{ 
    function __construct(NewsletterSubscriber $newsLetterSubscriber){
		$this->newsLetterSubscriber = $newsLetterSubscriber;
	}

    public function getNewsletters($request){
        $news_letters = $this->newsLetterSubscriber->getNewsletters($request);
		return Response::json(['status'=>200,'data'=>$news_letters]);
    }
}