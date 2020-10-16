<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use App\User;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showForm(){

        return view('auth.register');
    }

    public function validator(Request $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'lname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1'],
            'office' => ['required'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }


    public function create(Request $data)
    {
       // return 'test';


        return User::create([
            'username' => $data->username,
            'lname' => $data->lname,
            'fname' => $data->fname,
            'mname' => $data->mname,
            'role' => $data->role,
            'office_id' => $data->office,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

    }

    public function addAdminAccount(){
        return User::create([
            'username' => 'admin',
            'lname' => 'AMPARADO',
            'fname' => 'ETIENNE',
            'mname' => 'N',
            'role' => 'ADMINISTRATOR',
            'office_id' => '1',
            'email' => 'etiennewayne@gmail.com',
            'password' => Hash::make('a'),
        ]);

    }
}
