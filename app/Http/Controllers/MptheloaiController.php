<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mptheloai;
use App\Http\Requests\MptheloaiRequest;
use File;
class MptheloaiController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
     

    }
    // lấy danh sách


    public function getDanhsach(){
      $data=Mptheloai::select('id_danhmuc','ten_danhmuc','noidung_danhmuc','banner_anhdai','parent_id','thutu')
            ->orderBy('id_danhmuc','DESC')
            ->get()
            ->toArray();
    	return view('backend.theloai.danhsach',compact('data'));
    }
    // thêm
    
    public function getThem(){
      $data=Mptheloai::all();
    	return view('backend.theloai.them',['data'=>$data]);
    }
    // thêm
     public function postThem(MptheloaiRequest $request ){
      // bắt lỗi
    $this->validate($request,
     [
      'ten'=>'unique:mptheloais,ten_danhmuc',
      'fImages'=>'required',
     ],
     [

       'ten.unique'=>'Tên này đã tồn tại trong dữ liệu',
       'fImages.required'=>'Bạn chưa chọn tệp',

     ]
      );
    // thực hiện
            $file_name=$request->file('fImages')->getClientOriginalName();

            $theloai=new Mptheloai;
            $theloai->ten_danhmuc=trim($request->ten);
            $theloai->alias=changeTitle(trim($request->ten));
            $theloai->banner_anhdai=$file_name;
            $theloai->noidung_danhmuc=$request->noidung;
            $theloai->parent_id=$request->theloai;
            $theloai->thutu=$request->thutu;
            $request->file('fImages')->move('resources/upload/danhmuc/banner_anhdai',$file_name);

            $theloai->save();

           // public_path('upload/danhmuc/abc.jpg')
           // asset()

            return redirect()->route('backend.theloai.danhsach')->with(['flash_level'=>'success','flash_message'=>'Thêm dữ liệu thành công']);
            

    }
    // xóa
    public function getXoa($id){
  $parent=Mptheloai::where('parent_id',$id)->count();
    $tontai=Mptheloai::where('id_danhmuc',$id)->count();
     if($tontai==0){
          // không tồn tại id
        return redirect()->route('backend.theloai.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Thể loại này không tồn tại</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }
      if($parent==0){
        // xóa thành công
        $theloai=Mptheloai::find($id);
        $anh_hientai='resources/upload/danhmuc/banner_anhdai/'.$theloai->banner_anhdai;
            if(File::exists($anh_hientai))
               {
                File::delete($anh_hientai);
               }
        $theloai->delete();
        return redirect()->route('backend.theloai.danhsach')->with(['flash_level'=>'success','flash_message'=>'<h3>Xóa dữ liệu "(<b class="text-primary">'. $theloai->ten_danhmuc.'</b>)" thành công </h3>']);
        }
        else
        {
             // thể loại cha có thể loại con
          return redirect()->route('backend.theloai.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Thể loại này tồn tại thể loại con không xóa được</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        

        }
    }
    //sửa
       public function getSua($id){
     $tontai=Mptheloai::where('id_danhmuc',$id)->count();
     if($tontai==0){
          // không tồn tại id
        return redirect()->route('backend.theloai.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Thể loại này không tồn tại</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }
        $data=Mptheloai::find($id)->toArray();

    $parent=Mptheloai::select('id_danhmuc','ten_danhmuc','parent_id')->get()->toArray();
     
      return view('backend.theloai.sua',compact('parent','data'));
    }
     public function postSua(MptheloaiRequest $request,$id ){
      // bắt lỗi
    $this->validate($request,
           [
            'ten'=>'unique:mptheloais,ten_danhmuc,'.$id.',id_danhmuc',
           
           ],
           [

             'ten.unique'=>'Tên này đã tồn tại trong dữ liệu',
           ]
      );
            $theloai=Mptheloai::find($id);
        $anh_hientai='resources/upload/danhmuc/banner_anhdai'.$request->anh_hientai;
            if(!empty($request->file('fImages')))
            {
            $file_name=$request->file('fImages')->getClientOriginalName();
            $theloai->banner_anhdai=$file_name;
            $request->file('fImages')->move('resources/upload/danhmuc/banner_anhdai',$file_name);
               if(File::exists($anh_hientai))
               {
                File::delete($anh_hientai);
               }
            }
           

            $theloai->ten_danhmuc=trim($request->ten);
            $theloai->noidung_danhmuc=$request->noidung;
            $theloai->parent_id=$request->theloai;
            $theloai->thutu=$request->thutu;

            $theloai->save();
   
            return redirect()->route('backend.theloai.danhsach')->with(['flash_level'=>'success','flash_message'=>'Cập nhật thành công']);
            

    }


    // end
}
