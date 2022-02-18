<?php
namespace App\Services\Admin\Design;

use App\Models\Admin\Cms;
use Illuminate\Support\Str;
use Response,Helper,Validator;

class DesignService
{ 
    function __construct(Cms $cms){
		$this->cms = $cms;
	}

    public function createCMSPage($request) {
        $validator = Validator::make($request->all(), [
            'list_type' => 'required|in:usefull_links,guide',
            'menu_name' => 'required',
            'slug' => 'required|unique:cms,slug',
            'page_title' => 'required',
            'page_content' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $cms_page = $this->cms->createCMSPage($request);
		return Response::json(['status'=>200,'data'=>$cms_page]);
    }

    public function getCMSPages($request) {
        $cms_pages = $this->cms->getCMSPages($request);
		return Response::json(['status'=>200,'data'=>$cms_pages]);
    }

    public function getCMSPage($request) {
        $cms_page = $this->cms->getCMSPage($request);
		return Response::json(['status'=>200,'data'=>$cms_page]);
    }

    public function updateCMSPage($request) {
        $validator = Validator::make($request->all(), [
            'cms_page_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $cms_page = $this->cms->updateCMSPage($request);
		return Response::json(['status'=>200,'data'=>$cms_page]);
    }

    public function deleteCMSPage($request) {
        $validator = Validator::make($request->all(), [
            'cms_page_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status'=> 0,'data'=> $validator->errors()], 200);
        }
        $cms_page = $this->cms->deleteCMSPage($request);
		return Response::json(['status'=>200,'data'=>$cms_page]);
    }
}