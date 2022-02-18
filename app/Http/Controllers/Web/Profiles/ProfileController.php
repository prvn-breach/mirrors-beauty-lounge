<?php
namespace App\Http\Controllers\Web\Profiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Profiles\ProfileService;
class ProfileController extends Controller
{
	function __construct(ProfileService $getProfileService){
		$this->getProfileService = $getProfileService;
	}
    public function updateProfile(Request $request){
    	return $this->getProfileService->updateProfile($request);
    }
    public function updateProfileImage(Request $request){
    	return $this->getProfileService->updateProfileImage($request);
    }
}
