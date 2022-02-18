<?php
namespace App\Http\Controllers\Web\Newsletters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Newsletters\NewsletterService;

class NewsletterController extends Controller
{
    function __construct(NewsletterService $newsletterService){
        $this->newsletterService = $newsletterService;
    }

    public function subscribe(Request $request) {
        return $this->newsletterService->subscribe($request);
    }
}