<?php
namespace App\Services\Web\Profiles;
use App\Models\Web\User;
use Helper,Response,Validator;
class ProfileService
{
	function __construct(User $getUser){
		$this->getUser = $getUser;
	}
	
	public function updateProfile($request){
		$data = $request->all();
		$id = $data['id'];
		unset($data['id']);
		$this->getUser->updateUser($id,$data);
		$getUser = $this->getUser->getUser($id);
		return Response::json(['status'=>1,'data'=>$getUser]);

	}

	public function updateProfileImage($request){
		$validator = Validator::make($request->all(), [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if($validator->fails()){
			return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
		}

        $data = $request->all();
        $imageName = uniqid().'-'.$data['id'].'.'.$request->image->extension();  
        $request->image->move(public_path('images/profiles'), $imageName);
        $id = $data['id'];
		unset($data['id']);
		$updateData['profile_image'] =$imageName;
		$this->getUser->updateUser($id,$updateData);
		$getUser = $this->getUser->getUser($id);
		return Response::json(['status'=>1,'data'=>$getUser]);
		

	}
}