<?php
namespace App\Http\Controllers\Admin\Newsletters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Newsletters\NewsletterService;

class NewsletterController extends Controller
{
    function __construct(NewsletterService $newsletterService){
        $this->newsletterService = $newsletterService;
    }

    public function getNewsletters(Request $request) {
        return $this->newsletterService->getNewsletters($request);
    }
}