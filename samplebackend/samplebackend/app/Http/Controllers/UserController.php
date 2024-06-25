<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function get_user(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {
              $res['success'] = true;
              $res['message'] = $user;

              return response($res);
        }else{
          $res['success'] = false;
          $res['message'] = 'Cannot find user!';

          return response($res);
        }
    }
}
