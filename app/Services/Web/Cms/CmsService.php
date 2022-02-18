<?php
namespace App\Services\Web\Cms;

use App\Models\Web\Cms;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class CmsService
{ 
    function __construct(Cms $cms){
		$this->cms = $cms;
	}
    
    public function getCMSPages($request) {
        $cms_pages = $this->cms->getCMSPages($request);
		return Response::json(['status'=>200,'data'=>$cms_pages]);
    }

    public function getCMSPage($request) {
        $cms_page = $this->cms->getCMSPage($request);
		return Response::json(['status'=>200,'data'=>$cms_page]);
    }
}