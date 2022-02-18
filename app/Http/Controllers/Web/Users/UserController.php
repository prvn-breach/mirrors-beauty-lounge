<?php
namespace App\Http\Controllers\Web\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\Users\UserService;
class UserController extends Controller
{
	function __construct(UserService $getUserService){
		$this->getUserService = $getUserService;
	}

   public function changePassword(Request $request){
   	$changePassword = $this->getUserService->changePassword($request);
      return $changePassword;
   }

   public function getResetPasswordToken(Request $request){
   	$getResetPasswordToken = $this->getUserService->getResetPasswordToken($request);
      return $getResetPasswordToken;
   }

   public function forgotPasswordMail(Request $request){
   	$forgotPassword = $this->getUserService->forgetPasswordSendMail($request);
      return $forgotPassword;
   }

   public function forgotPassword(Request $request){
   	$forgotPassword = $this->getUserService->forgotPassword($request);
      return $forgotPassword;
   }
   
   public function authenticate(Request $request){
      $getUsers = $this->getUserService->authenticate($request);
   	return $getUsers;
   }

   public function register(Request $request){
   	return $this->getUserService->register($request);
   }

   public function getAuthenticatedUser(){
   	return $this->getUserService->getAuthenticatedUser();
   }

   public function logout(Request $request){
      return $this->getUserService->logout($request);
   }
}
