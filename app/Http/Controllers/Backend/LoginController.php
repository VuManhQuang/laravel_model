<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout', 'userLogout']]);
    }

    public function showLoginForm()
    {
      return view('backend.login');
    }
 
    public function login(Request $request)
    {
      // Validate the form data
    
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->route('backend.theloai.danhsach');
      }
      else{
      // if unsuccessful, then redirect back to the login with the form data

        return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Sai mật khẩu hoặc tài khoản']);
      }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('backend.login');
    }
}
