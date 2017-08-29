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
use App\User;
use App\Mpgiaodich;
use App\Mpkhuyenmai;
use App\Mpquatang;
use App\Mpdathang;
use Cart;
use Auth;
use Mail;
use Illuminate\Support\Facades\DB;
use Socialite;

class UserController extends Controller
{

    // get dangky
    public function dangky(){
    	      // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();
        
        	    // end phần giao diện
             if(Auth::guard('web')->check()){
    		
          return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));
    		}
    		else
    		{
        return view('frontend.dangky',compact('cartItems','menu','footer','lienhe','danhmuc','quangcao1','quangcao2','cartItems'));

    		}
    }
        // post dangky

  	public function laptaikhoan(Request $request) {
		
              // bắt lỗi
        $this->validate($request,
           [
            'email'=>'required|email|unique:users,email|regex:/^[a-zA-Z0-9_@.]*$/',
          'password'=>'required|alpha_dash|regex:/^[a-zA-Z0-9]*$/',
           'laipassword'=>'required|same:password',
            'phone'=>'required|regex:/(0)[0-9]{9}/|between:10,11'
            
        
           ],
           [
     
             'email.required'=>"Bạn chưa nhập Email",
             'email.email'=>'Bạn phải nhập đúng định dạng email',
             'email.unique'=>'Email này đã tồn tại trong dữ liệu',
             'email.regex'=>'Bạn phải nhập đúng định dạng email',

             'password.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Độ dài mật khẩu yếu bạn cần nhập từ 10 ký tự trở lên',
             'password.regex'=>'Mật khẩu bạn nhập chứa ký tự đặc biệt',
             'password.alpha_dash'=>'Mật khẩu bạn nhập chứa ký tự đặc biệt',
             'laipassword.required'=>'Bạn chưa nhập lại mật khẩu',
             'laipassword.same'=>'Mật khẩu nhập lại không khớp với mật khẩu trên',
             'phone.required'=>'Bạn chưa nhập số điện thoại',
             'phone.regex'=>'Bạn nhập chưa đúng số điện thoại',
             'phone.between'=>'Bạn nhập chưa đúng số điện thoại',

           ]
         );
        
        // end bắt lỗi
        // thực hiện

            $taikhoan=new User;
            $taikhoan->username=trim($request->hovaten);
            $taikhoan->email=trim($request->email);
            $taikhoan->password=bcrypt($request->password);
            $taikhoan->phone_user=$request->phone;
            $taikhoan->diachi_user=$request->diachi;
            $taikhoan->kieu=0;

            $taikhoan->save();
             if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
         return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> BẠN ĐĂNG KÝ THÀNH CÔNG, ĐÃ ĐĂNG NHẬP VÀO HỆ THỐNG</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);     
       }else
       {
       	 return redirect()->action('UserController@login')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> ĐĂNG NHẬP THẤT BẠI BẠN VUI LÒNG ĐĂNG NHẬP LẠI</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);       
       }



	}
	    // get logout
        public function logout(){
    	      // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();
        
        	    // end phần giao diện
        if(Auth::guard('web')->check()){
    		 Auth::guard('web')->logout();
           return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> ĐĂNG XUẤT THÀNH CÔNG</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);   

    		}
    		else
    		{
        
          return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));

    		}
    }
	      // get login

    public function login(){
    	      // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();
        
        	    // end phần giao diện
        if(Auth::guard('web')->check()){
    		
          return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));
    		}
    		else
    		{
        return view('frontend.dangnhap',compact('cartItems','menu','footer','lienhe','danhmuc','quangcao1','quangcao2','cartItems'));

    		}
    }

      // post login
  	public function thuchiendangnhap(Request $request) {
		
              // bắt lỗi
        $this->validate($request,
           [
            'email'=>'required',
          'password'=>'required',
          
            
        
           ],
           [
     
             'email.required'=>"Bạn chưa nhập Email",
          

             'password.required'=>'Bạn chưa nhập mật khẩu',
        

           ]
         );
        
        // end bắt lỗi
        // thực hiện
    
      // Attempt to log the user in
      if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
         return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> BẠN ĐĂNG Nhập THÀNH CÔNG</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);     
       }
      else{
      // if unsuccessful, then redirect back to the login with the form data

       return redirect()->action('UserController@login')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> ĐĂNG NHẬP THẤT BẠI</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);       
      }
 
             



	}

    	public function thongtintaikhoan() {
	      // phần giao diện          
        $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();
        
        	    // end phần giao diện
    		if(Auth::guard('web')->check()){
    		
        return view('frontend.thongtintaikhoan',compact('cartItems','menu','footer','lienhe','danhmuc','quangcao1','quangcao2','cartItems'));
    		}
    		else
    		{
          return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));

    		}
		
        }

    	public function thaydoimatkhau() {
	      // phần giao diện          
        
        }
        public function suathongtin() {
	      // phần giao diện          
    
		
        }
            // get muahang
    public function muahang(){
            // phần giao diện 
          $footer=Mptieudeweb::where('key', "footer")->first();;
        $menu=Mpmenu::orderBy('thutu', 'asc')->get()->toArray();
        $lienhe=Mphotro::all()->first();
        $quangcao1=Mpquangcaosanpham::where('thutu', 1)->first();
        $quangcao2=Mpquangcaosanpham::where('thutu', 2)->first();
        $danhmuc=Mptheloai::where('parent_id', 0)->orderBy('thutu', 'asc')->get()->toArray();
        $cartItems=Cart::content();
        
              // end phần giao diện
        if(Cart::count()>0){         
    
         
        return view('frontend.muahang',compact('cartItems','menu','footer','lienhe','danhmuc','quangcao1','quangcao2','cartItems'));
         }
         else
         {
          return view('frontend.error.error404',compact('menu','footer','lienhe','danhmuc','cartItems'));

         }
  
        }
                 // post muahang
    public function dathang(Request $request ){

                      // bắt lỗi
         $this->validate($request,
           [
            'email'=>'required|email|regex:/^[a-zA-Z0-9_@.]*$/',
            'diachi'=>'required|min:30',

            'phone'=>'required|regex:/(0)[0-9]{9}/|between:10,11',
            'thanhtoan'=>'required'
        
           ],
           [
     
             'email.required'=>"Bạn chưa nhập Email",
             'email.email'=>'Bạn phải nhập đúng định dạng email',
             'email.unique'=>'Email này đã tồn tại trong dữ liệu',
             'email.regex'=>'Bạn phải nhập đúng định dạng email',
              'diachi.required'=>"Bạn chưa nhập địa chỉ nhận hàng",

             'diachi.min'=>'Bạn phải nhập địa chỉ nhận rõ ràng',
             'thanhtoan.required'=>'Bạn chưa chọn hình thức thanh toán',

             'phone.required'=>'Bạn chưa nhập số điện thoại',
             'phone.regex'=>'Bạn nhập chưa đúng số điện thoại',
             'phone.between'=>'Bạn nhập chưa đúng số điện thoại',

           ]
         );
        
        // end bắt lỗi
      // thực hiện 
            $cartItems=Cart::content();

                     $total_amount=0; 
                  
                      foreach($cartItems as $cartItem)
                        {
                          $total_amount+=$cartItem->price*$cartItem->qty; 
                         }
                  
       $quatang=0; $tong_dau=0;
        $khuyenmai=Mpkhuyenmai::all();
        foreach ($khuyenmai as $get_khuyenmai) {
           if(time()>=strtotime($get_khuyenmai['thoigian_batdau'])&&time()<=strtotime($get_khuyenmai['thoigian_ketthuc']))
           {
           
             $khuyenmai_qua=DB::table('mpkhuyenmaiquatangs')->where('id_khuyenmai', $get_khuyenmai['id_khuyenmai'])->get(); // lấy thông tin sản phẩm từ đánh giá

           }
        }
        $id_thanhvien=0;
                if(Auth::guard('web')->check()){
                  $id_thanhvien=Auth::user()->id_thanhvien;
                 }
        if($khuyenmai_qua)
        {
       
        foreach ($khuyenmai_qua as $get_qua) {
                  $qua=Mpquatang::where('id_quatang',$get_qua->id_quatang)->get()->first();

           if($qua['tong_giatri']<=$total_amount)
           {
               if($tong_dau<$qua['tong_giatri'])
               {
                  $tong_dau=$qua['tong_giatri'];
                  $quatang=$qua['id_quatang'];

               }
           }
        }
         }

       
        // thêm vào giao dịch
            $giaodich=new Mpgiaodich;
            $giaodich->user_name=trim($request->hovaten);
            $giaodich->user_email=trim($request->email);
            $giaodich->user_phone=trim($request->phone);
            $giaodich->id_thanhvien=$id_thanhvien;
            $giaodich->id_quatang=$quatang;
            $giaodich->status=0; // 0 là chưa thanh toán , 1 thanh toán xong, 2 thanh toán thất bại
            $giaodich->payment=$request->thanhtoan;
            $giaodich->amount=$total_amount;

            $giaodich->message=$request->diachi;

            $giaodich->save();

       // thêm order
            $id_giaodich=$giaodich->id_giaodich;
          
                      foreach($cartItems as $row){
                        $order=new Mpdathang;

                     $order->id_giaodich=$id_giaodich;
                      $order->id_sanpham=$row->id;
                    $order->ten_sanpham=$row->name;
                     $order->qty=$row->qty;
                     $order->amount=$row->price*$row->qty;
                     $order->data='';

                                $order->save();

            }
                        $nhanqua=Mpquatang::where('id_quatang',$quatang)->get()->first();
                          // Xóa thông tin giỏ hàng

            Cart::destroy();
              if($request->thanhtoan=='OffLine')
               {
                      if(!$nhanqua)
                      {
                  return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> Bạn đã đặt hàng thành công, chúng tôi sẽ gửi hàng cho bạn sớm nhất có thể</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);  
                      }
                      else
                      {

                     return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> Bạn đã đặt hàng thành công và nhận được phần quà: <b style="color:blue;">'.$nhanqua['quatang'].'</b></h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);     
                 
                      }

                // chuyển tới trang 
               } 


       
  
        }
           // gửi gmail
    public function lienhe() {
	      // phần giao diện          
          $data=['hoten'=>'Vũ Mạnh Quang'];
          Mail::send('emails.blanks',$data,function($message){
          	$message->from('manhquangit@gmail.com','Mạnh Quang');
          	$message->to('manhquangit@gmail.com','Anh em')->subject('Đây là test');
          });
		
		
        }
        // login facebook
        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

       try{
          $socialUser = Socialite::driver('facebook')->user();

       }
       catch(\Exception  $e){
   return redirect()->action('UserController@login')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> ĐĂNG NHẬP THẤT BẠI</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);   
          }
       $user=User::where('facebook_id',$socialUser->getId())->first();
       if(!$user){
         $user=User::create([
          'facebook_id'=>$socialUser->getId(),
          'username'=>$socialUser->getName(),
          'email'=>$socialUser->getEmail(),
          ]);
       }
        // $user->token;
        Auth::guard('web')->login($user);
                // Attempt to log the user in
        // if successful, then redirect to their intended location
         return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> BẠN ĐĂNG Nhập THÀNH CÔNG</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);     


    }
        // end login facebook
         // login google
        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function googleredirectToProvider()
    {
        return Socialite::driver('google')->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function googlehandleProviderCallback()
    {

       try{
          $socialUser = Socialite::driver('google')->user();

       }
       catch(\Exception  $e){
             return redirect('/');
       }
       $user=User::where('facebook_id',$socialUser->getId())->first();
       if(!$user){
         $user=User::create([
          'facebook_id'=>$socialUser->getId(),
          'username'=>$socialUser->getName(),
          'email'=>$socialUser->getEmail(),

          ]);
       }
        // $user->token;
        Auth::guard('web')->login($user);
                // Attempt to log the user in
        // if successful, then redirect to their intended location
         return redirect()->action('PageController@index')->with(['flash_thongbao'=>'<div class="modal fade in" id="modalthongbao"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-primary" id="myModalLabel"> Thông báo</h4></div><div class="modal-body"><div class="text-success text-center"><h3> BẠN ĐĂNG Nhập THÀNH CÔNG</h3></div></div><div class="modal-footer"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div></div></div></div></div>']);     


    }
        // end login google
}
