<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    //  public function handle($request, Closure $next, $guard = null)
    //  {
    //      if ($this->auth->guard($guard)->guest()) {
    //          $token = $request->header('token'); // Mengambil token dari header 'token'
     
    //          if ($token) {
    //              $user = DB::connection('mysql')->table('users')->first();
     
    //              if ($user) {
    //                  // If user is found, manually login the user
    //                  Auth::loginUsingId($user->id);
    //              } else {
    //                  $res['success'] = false;
    //                  $res['message'] = 'Permission Not Allowed';
     
    //                  return response()->json($res, 403); // Use appropriate HTTP status code for permission issues
    //              }
    //          } else {
    //              $res['success'] = false;
    //              $res['message'] = 'Not Authorized';
     
    //              return response()->json($res, 401); // Use appropriate HTTP status code for unauthorized access
    //          }
    //      }
     
    //      return $next($request);
    //  }

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if ($this->auth->guard($guard)->guest()) {
    //         if($request->has('password')){
    //             $token = $request->headers('Authorization')->exist();
    //             $check_token = DB::connection('mysql')->table('users')->where('password', $token)->first();

    //             if ($check_token == null){
    //                 $res['success'] = false;
    //                 $res['message'] = 'Permission Not Allowed';

    //                 return response($res);
    //             }
    //             else{
    //                 $res['success'] = false;
    //                 $res['message'] = 'Not Authorized';
    //                 return response($res);
    //             }
    //         }
    //         //return response('Unauthorized.', 401);
    //     }

    //     return $next($request);
    // }

    
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            if($request->header('password')) {
                $token = $request->header('password');
                if ($token) {
                    $check_token = DB::connection('mysql')
                        ->table('users')
                        ->where('password', $token)
                        ->first();
                        // echo($check_token);

                    if ($check_token === null) {
                        $res['success'] = false;
                        $res['message'] = 'Permission Not Allowed';
                        return response()->json($res, 403);
                    }
                } else {
                    $res['success'] = false;
                    $res['message'] = 'Not Authorized';
                    return response()->json($res, 401);
                }
            } else {
                return response($request->header('password'), 401);
            }
        }

        return $next($request);
    }
     

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if ($this->auth->guard($guard)->guest()) {
    //         if($request->has('password')){
    //             $token = $request->header('Authorization')->exist();
    //             $check_token = DB::connection('mysql')->table('users')->where('password', $token)->first();

    //             if ($check_token == null){
    //                 $res['success'] = false;
    //                 $res['message'] = 'Permission Not Allowed';

    //                 return response($res);
    //             }
    //             else{
    //                 $res['success'] = false;
    //                 $res['message'] = 'Not Authorized';
    //                 return response($res);
    //             }
    //         }
    //         //return response('Unauthorized.', 401);
    //     }

    //     return $next($request);
    // }
}
