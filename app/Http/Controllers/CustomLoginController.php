<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{
    //


    public function authenticate(Request $request)
    { 
        
       // return $request;
       // $credentials = $request->only('username', 'password');
       

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed...
           // return redirect()->intended('dashboard');

           return 'login';
        }

        return 'error';
    }



}
