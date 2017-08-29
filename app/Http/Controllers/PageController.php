<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mpprodcut;
use App\Mpslide;
use App\Mptheloai;
use App\Mpmenu;
use App\Mptieudeweb;
use App\Mpquangcaosanpham;
use App\Mphotro;
use Cart;
use Illuminate\Support\Facades\DB;
class PageController extends Controller {
	public function index() {
		$sanphammoi = Mpprodcut::orderBy('id_sanpham','desc')->limit(10,0)->get()->toArray();
	    $sanphamquantam = Mpprodcut::orderBy('view','desc')->limit(10,0)->get()->toArray();
        $slide=Mpslide::orderBy('thutu_slide','asc')->get()->toArray();
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $lienhe=Mphotro::all()->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();

    return view('frontend.home', compact('sanphammoi','slide','menu','footer','sanphamquantam','quangcao1','quangcao2','lienhe','danhmuc','cartItems'));
	}
	// xem chi tiết sản phẩm
	public function chitietsanpham($alias) {
			
          $idcantim=Mpprodcut::where('alias',substr($alias, 0, -5))->first();
            // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
      $cartItems=Cart::content();

        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
	    // end phần giao diện
          if(!isset($idcantim)||count($idcantim)==0)
	     {
              return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));

	     }

         $id=$idcantim['id_sanpham'];
            $danhmucdachon=DB::table('mptheloais')->where('id_danhmuc', $idcantim['id_danhmuc'])->first();

         $sanpham = Mpprodcut::where('id_sanpham', $id)->first();
             // cập nhật lại lượt vỉew
           $capnhat=Mpprodcut::find($id);


            $capnhat->view=intval($sanpham['view'])+1;// tăng thêm 1 lần xem

            $capnhat->save();

    return view('frontend.chitiet', compact('sanpham','menu','footer','lienhe','danhmuc','danhmucdachon','quangcao1','quangcao2','cartItems'));


	}
	// end xem chi tiết sản phẩm
	// lấy danh sách các sản phẩm thuộc danh mục
	public function danhsach($alias) {
		
	     $idcantim=Mptheloai::where('alias',substr($alias, 0, -5))->first();
	    // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
         $cartItems=Cart::content();

        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
	    // end phần giao diện
	     if(!isset($idcantim)||count($idcantim)==0)
	     {
              return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));

	     }
	     $id=$idcantim['id_danhmuc'];
         $chuoi_idcon=getid_con($id);
         $mangcon=explode(" ", $chuoi_idcon);

         $sanpham = DB::table('mpprodcuts')->whereIn('id_danhmuc', $mangcon)->orderBy('id_sanpham','desc')->paginate(16);

          $danhmucdachon=DB::table('mptheloais')->where('id_danhmuc', $id)->first();
          

    return view('frontend.danhsach', compact('sanpham','menu','footer','danhmucdachon','lienhe','danhmuc','cartItems'));
	}
	// end lấy danh sách các sàn phẩm thuộc danh mục
		// tìm kiếm sản phẩm

	public function timkiem(Request $request) {
		
	$sanpham = Mpprodcut::where('ten_sanpham','like', '%'.$request->key_search.'%')->orderBy('id_sanpham','desc')->paginate(18);

          $danhmucdachon=$request->key_search;
          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
               $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
      $cartItems=Cart::content();

	
    return view('frontend.timkiem', compact('sanpham','menu','footer','danhmucdachon','lienhe','danhmuc','cartItems'));
         
	}
	// end tìm kiếm sản phẩm
		// lấy danh sách tìm kiếm tự động các sản phẩm thuộc danh mục
	public function timkiem_tudong( Request $request) {
	
            $key=$request->term;
		        if($key!="")
            {

     $sanpham=Mpprodcut::where('ten_sanpham','like', '%'.$key.'%')->take(6)->get();

                 // auto danh sách trên thanh tìm kiếm
            $result=array();
     
            foreach($sanpham as $row)
            {
              $result[]=['value'=>$row->ten_sanpham];
   
            }
        
        
            // dữ liệu trả về dưới dạng json
    return response()->json($result);
            }
     
	}
	// end lấy danh sách tìm kiếm tự động các sàn phẩm thuộc danh mục
	
}