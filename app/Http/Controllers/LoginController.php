<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth:admin');
    }
    public function getLogin() {
    	return view('backend.theloai.login');
    }
}
