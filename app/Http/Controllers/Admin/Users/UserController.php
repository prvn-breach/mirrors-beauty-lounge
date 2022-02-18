<?php
namespace App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Users\UserService;
class UserController extends Controller
{
	function __construct(UserService $getUserService){
		$this->getUserService = $getUserService;
	}

   public function changePassword(Request $request){
   	$changePassword = $this->getUserService->changePassword($request);
      return $changePassword;

   }

   public function forgotPassword(Request $request) {
      return $this->getUserService->forgotPassword($request);
   }
   
   public function authenticate(Request $request){
      $getUsers = $this->getUserService->authenticate($request);
   	return $getUsers;
   }

   public function register(Request $request){
   	return $this->getUserService->register($request);
   }

   public function sellerRegister(Request $request){
      return $this->getUserService->sellerRegister($request);
   }

   public function updateProfile(Request $request) {
      return $this->getUserService->updateProfile($request);
   }

   public function updateSellerProfile(Request $request) {
      return $this->getUserService->updateSellerProfile($request);
   }

   public function getAuthenticatedUser(){
   	return $this->getUserService->getAuthenticatedUser();
   }

   public function getUsers(Request $request){
      return $this->getUserService->getUsers($request);
   }

   public function getUserDetail(Request $request){
      return $this->getUserService->getUserDetail($request);
   }

   public function getCustomerReports(Request $request){
      return $this->getUserService->getCustomerReports($request);
   }

   public function getSellers(Request $request) {
      return $this->getUserService->getSellers($request);
   }

   public function createCustomer(Request $request) {
      return $this->getUserService->createCustomer($request);
   }
}
