<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    //
    //use AuthenticatesUsers;
 use AuthTrait;
   
 public function __construct()
 {
     $this->middleware('guest')->except('logout');
 }


    public function formLogin($type)
    {
        return view('auth.login',compact('type'));
    }

    public function login(Request $request){


        //return $request;
        if (Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
           return $this->redirect($request);
        }

    }

    
       
    
    public function logout(Request $request,$type)
    {
       
     //  return $type;
       //  return $request;
       Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

          return redirect('/');
    }

    
}
