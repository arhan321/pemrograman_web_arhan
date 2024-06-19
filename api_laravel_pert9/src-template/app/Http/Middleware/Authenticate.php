<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    
    // public function handle($request, Closure $next, ...$guards)
    // {
    //     if ($this->auth->guard($guards)->guest()) {
    //         $token = $request->header('password'); 
    
    //         if ($token) {
    //             $check_token = DB::connection('mysql')
    //                 ->table('users')
    //                 ->where('password', $token)
    //                 ->first();
    
    //             if ($check_token === null) {
    //                 $res['success'] = false;
    //                 $res['message'] = 'Permission Not Allowed';
    //                 return response()->json($res, 403);
    //             }
    //         } else {
    //             $res['success'] = false;
    //             $res['message'] = 'Not Authorized';
    //             return response()->json($res, 401);
    //         }
    //     } else {
    //         $res['success'] = false;
    //         $res['message'] = 'Not Authorized';
    //         return response()->json($res, 401);
    //     }
    
    //     return $next($request);
    // }
}
