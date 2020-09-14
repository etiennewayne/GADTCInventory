<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function __construct(){
        $this->middleware('revalidate');
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.admin-user');
    }


    public function create(){

    }


    public function fetchData(){
        return \DB::select('select * from users');
    }


}
