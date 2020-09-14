<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('revalidate');
        $this->middleware('auth');
    }

    public function showForm(){
        return view('admin.admin-home');
    }
}
