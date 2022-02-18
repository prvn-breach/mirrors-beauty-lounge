<?php 
namespace App\Http\Middleware;
    use Closure;
    use JWTAuth;
    use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
    use Exception;
    use Illuminate\Support\Facades\Config;
    class JwtMiddleware extends BaseMiddleware
    {

        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
           $this->setAuthAdmin();
            try {
                $user = JWTAuth::parseToken()->authenticate();
            } catch (Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                    return response()->json(['status' => 0,'error'=>'invalidException']);
                }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                    return response()->json(['status' => 0,'error'=>'expired_token']);
                }else{
                    return response()->json(['status' => 0,'error'=>'token_not_found']);
                }
            }
            return $next($request);
        }

        public function setAuthAdmin(){
        Config::set( 'auth.defaults.guard', 'admins' );
        Config::set('jwt.user', 'App\Models\Admin\Admin'); 
        Config::set('auth.providers.users.model', \App\Models\Admin\Admin::class);
    }
}