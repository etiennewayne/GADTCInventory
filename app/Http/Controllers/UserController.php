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
        return view('admin.admin-create');
    }


    public function fetchData(){
        return \DB::select('select * from users');
    }

    public function offices(){
        return \DB::table('offices')->orderBy('office_code', 'asc')->get();
    }


}
