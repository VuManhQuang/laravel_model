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
class CartController extends Controller
{
    //
    // thêm vào giỏ hàng
    public function muahang($alias){
        $idcantim=Mpprodcut::where('alias',substr($alias, 0, -5))->first();
       

         if(!isset($idcantim)||count($idcantim)==0)
	     {
	     	      // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
              $cartItems=Cart::content();

                $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();

        	    // end phần giao diện
              return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));

	     }
        $id=$idcantim['id_sanpham'];
        
       

      $sanpham=Mpprodcut::find($id);
      $giathuc=$sanpham->gia-$sanpham->discount;
      Cart::add(array('id'=>$id,'name'=>$sanpham->ten_sanpham,'qty'=>1,'price'=>$giathuc,'options'=>array('img'=>$sanpham->anh_sanpham_to)));
        return  redirect(route('giohang'));

    }
    // danh sách giỏ hàng
    public function giohang()
    {
    	      // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();
        
        	    // end phần giao diện
        return view('frontend.giohang',compact('cartItems','menu','footer','lienhe','danhmuc','quangcao1','quangcao2','cartItems'));

    }
    // xóa 1 sản phẩm giỏ hàng
     public function xoahang($rowId)
    {
                Cart::remove($rowId);

        	    // end phần giao diện
                  return  redirect(route('giohang'));


    }  
    // xóa tất cả sản phẩm giỏ hàng
     public function xoatatcahang()
    {              
          Cart::destroy();

        	    // end phần giao diện
                  return  redirect(route('giohang'));


    }
    // cập nhật giỏ hàng
    public function capnhatgiohang(Request $request){
    	    if($request->ajax()||$request->wantsJson()){
    	    	$result=array();
                  $rowid=$request->id; 
                  $qty=$request->qty; 
             
                  Cart::update($rowid,$qty);
       
                   $result['complete']=TRUE;
      $result['msg']='Cập nhật thành công';
      return response()->json($result);

            }
    }
    // đánh giá bằng sao 
  public function raty(Request $request) {
                 
    if($request->ajax()||$request->wantsJson()){

   $result=array();
      // lấy thông tin 
      $id=$request->id; 

     // lấy id sản phẩm gửi lên từ ajax
      $id=(!is_numeric($id))?0:$id;

      $info=Mpprodcut::find($id)->first(); // lấy thông tin sản phẩm từ đánh giá
      
      if(!$info)
      {
         $result['msg']='Sản phẩm này không tồn tại';
      return response()->json($result);
        exit();
      }

      // cập nhật trạng thái đã bình chọn
    
         // kiểm tra xem khách đã bình chọn hay chưa
     $raty = $request->session()->get('session_raty'.$id);
      // khai báo dữ liệu trả về  
      $raty=(!isset($raty)) ? "":$raty;
    
   
      // nếu đã tồn tại id sản phẩm này trong session đánh giá

      if($raty!="")
      {
        $result['msg']='Bạn chỉ được đánh giá 1 lần cho sản phẩm này';
       
        return response()->json($result);

      }
     session(['session_raty'.$id => $id]);
  
      $score=$request->score; // lấy số điểm post lên từ trang ajax
  
      // cập nhật lại đánh giá cho sản phẩm
       $capnhat=Mpprodcut::find($id);


            $capnhat->rate_total=$info->rate_total+$score;// tổng số điểm
            $capnhat->rate_count=$info->rate_count+1; // tổng số lượt đánh giá

            $capnhat->save();
      // khai báo dữ liệu trả về
      $result['complete']=TRUE;
      $result['msg']='Cảm ơn bạn đã đánh giá cho sản phẩm này';
      return response()->json($result);
    }
     
  }
  //end đánh giá bằng sao
}
