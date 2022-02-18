<?php
namespace App\Services\Web\Users;
use App\Models\Web\User;
use Helper,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Web\UserActivity;
use App\Services\Web\Customers\CustomerIpLocationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DB;

class UserService
{
	//
	function __construct(User $getUser, CustomerIpLocationService $ipService){
		$this->getUser = $getUser;
		$this->ipService = $ipService;
	}

    public function changePassword($request){
        $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:6|max:50|different:OldPassword',
        ]);

        if($validator->fails()){
                return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }
        $user = $this->getUser->getUser($request->id);
        if (Hash::check($request->old_password, $user->password)) { 
            $user->fill([
            'password' => Hash::make($request->password)
            ])->save();
            return response()->json(['status'=>200,'data'=>'Password changed'], 200); 
        } else {
                return response()->json(['status'=>1,'data'=>'Old password is not correct'], 200);  
        }


        
    }

    public function getResetPasswordToken($request) {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:password_resets,token'
        ]);

        $data = DB::table('password_resets')->where('token', $request['token'])->get();

        return response()->json(['status'=>200,'data'=> $data], 200); 
    }

    public function forgetPasswordSendMail($request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request['email'],
            'token' => $token,
            'created_at' => Carbon::now()->addMinutes(5)
        ]);

        // MAIL
        $subject = 'Reset Password Link';
        $email = $request['email'];
        Mail::send('ChangePassword', [
            'token' => $token,
        ], function($message) use ($email, $subject){
            $message->to($email);
            $message->subject($subject);
        });

        return response()->json(['status'=>200,'data'=> 'Reset password link sent successfully.'], 200); 
    }

    public function forgotPassword($request){
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:password_resets,token',
            'password' => 'required|confirmed|min:6|max:50',
        ]);

        $data = DB::table('password_resets')->where('token', $request['token'])->get();
        $email = '';
        if (count($data)) {
            $email = $data[0]->email;
        }

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }
        
        $user = User::where('email', $email)->first();
        $user->fill([
            'password' => Hash::make($request->password)
        ])->save();

        // MAIL
        $subject = 'Password changed successfully.';
        $email = $user['email'];
        Mail::send('ChangePasswordSuccessfully', [], function($message) use ($email, $subject){
            $message->to($email);
            $message->subject($subject);
        });

        return response()->json(['status'=>200,'data'=>'Password changed'], 200); 
    }

    public function authenticate($request) {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>0,'error' => 'invalid_credentials'], 200);
            }
        } catch (JWTException $e) {
            return response()->json(['status'=>0,'error' => 'could_not_create_token'], 200);
        }
        $status = 1;
        $user = User::where('email', $credentials['email'])->first();
        UserActivity::create([
            'user_id' => $user->id,
            'ip' => $this->ipService->getCustomerIpLocation(),
            'login' => Carbon::now()
        ]);
        return response()->json(compact('status','token'));
    }

    public function register($request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json(['status'=>0,'data'=>$validator->errors()], 200);
        }

        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'name' => $request->get('first_name')." ".$request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'password' => Hash::make($request->get('password')),
        ]);
        $status = 1;
        UserActivity::create([
            'user_id' => $user->id,
            'ip' => $this->ipService->getCustomerIpLocation(),
            'login' => Carbon::now()
        ]);

        // MAIL
        $subject = 'Registration Done';
        $email = $user['email'];
        $user_details = $user;
        $user_details['password'] = $request->get('password'); 
        Mail::send('Register', [
            'user' => $user_details,
        ], function($message) use ($email, $subject){
            $message->to($email);
            $message->subject($subject);
        });
        $token = JWTAuth::fromUser($user);
        return response()->json(['status'=>1,'data'=>compact('user','token','status')],201);
    }

    public function logout($request){
        $user_activity = UserActivity::where('user_id', $request['user_id'])->orderBy('id', 'desc')->first();
        $user_activity->logout = Carbon::now();
        $user_activity->update();
    }

    public function getAuthenticatedUser() {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 200);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            
            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }
        if($user != null){
            $getUser = $this->getUser->getUser($user->id);
            return response()->json(['status'=>200,'data'=>compact('getUser')]);
        }
    }
}
	