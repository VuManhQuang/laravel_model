<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mpgiaodich;
use App\Mpdathang;

class MpgiaodichController extends Controller
{
    //
     public function __construct(){
      $this->middleware('auth:admin');
     

    }
    // lấy danh sách

    public function getDanhsach(){
              $data=Mpgiaodich::orderBy('id_giaodich','DESC')->get()->toArray();
    	return view('backend.giaodich.danhsach',compact('data'));
    }
}
