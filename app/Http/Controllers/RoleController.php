<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use  Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }
     // lấy danh sách
    public function getDanhsach(){
      $data=Role::select( 'id', 'name','display_name', 'description')->orderBy('id','DESC')->get()->toArray();

      return view('backend.nhomquantri.danhsach',compact('data'));
    }

  // thêm
    
    public function getThem(Request $request ){
        $permissions=Permission::all();

        return view('backend.nhomquantri.them',compact('permissions'));
     
    }
    // thêm
     public function postThem(Request $request ){
      // bắt lỗi
    $this->validate($request,
           [
            'name'=>'required|unique:roles,description',

           ],
           [
            'name.required'=>'Bạn không được để trống',

             'name.unique'=>'Tên này đã tồn tại trong dữ liệu',

           ]
      );
        
          // thực hiện

            $quantri=new Role;
            $quantri->name=changeTitle($request->name);
            $quantri->display_name=ucfirst(changeTitle($request->name));
            $quantri->description=trim($request->name);
            $quantri->save();
            foreach ($request->permission as $key => $value) {
                   # code...
                       $quantri->attachPermission($value);

               }   


            return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_level'=>'success','flash_message'=>'Thêm dữ liệu thành công']);
            

    }
 //sửa
       public function getSua($id){
     $tontai=Role::where('id',$id)->count();
     if($id==0){
          // nhóm quản trị cao
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này cao nhất không được sửa</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }
     if($tontai==0){
          // không tồn tại id
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này không tồn tại</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }


        $data=Role::find($id);
        $permissions=Permission::all();

    $role_permissions=$data->perms()->pluck('id','id')->toArray();
     
      return view('backend.nhomquantri.sua',compact('permissions','data','role_permissions'));
    }
     public function postSua(Request $request,$id ){
    // bắt lỗi
    $this->validate($request,
           [
            'name'=>'required|unique:roles,description,'.$id.',id'

           ],
           [
             'name.required'=>'Bạn không được để trống',
             'name.unique'=>'Tên này đã tồn tại trong dữ liệu',

           ]
      );
            $quantri=Role::find($id);
            $quantri->name=changeTitle($request->name);
            $quantri->display_name=ucfirst(changeTitle($request->name));
            $quantri->description=trim($request->name);
            $quantri->save();
            DB::table('permission_role')->where('role_id',$id)->delete();
            foreach ($request->permission as $key => $value) {
                   # code...
                $quantri->attachPermission($value);
               }   

   
            return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_level'=>'success','flash_message'=>'Cập nhật thành công']);
            

    }
    // xóa
    public function getXoa($id){
    $tontai=Role::where('id',$id)->count();
     if($id==0){
          // nhóm quản trị cao
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này cao nhất không được xóa</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }
     if($tontai==0){
          // không tồn tại id
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này không tồn tại</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }
        $do_user=DB::table('role_user')->where('role_id',$id)->count();

          if($do_user>0){

              return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này đang chứa các ban quản trị</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        }

        // xóa thành công
        DB::table('roles')->where('id',$id)->delete();
        $do_per=DB::table('permission_role')->where('role_id',$id)->count();

        if($do_per>0){
            DB::table('permission_role')->where('role_id',$id)->delete();
        }
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_level'=>'success','flash_message'=>'<h3>Xóa dữ liệu thành công </h3>']);
 
    }
 //chi tiết
       public function getChitiet($id){
     $tontai=Role::where('id',$id)->count();
     if($id==0){
          // nhóm quản trị cao
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này cao nhất không được sửa</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }
     if($tontai==0){
          // không tồn tại id
        return redirect()->route('backend.nhomquantri.danhsach')->with(['flash_loi'=>'<div class="modal fade in" id="modalbaoloi"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-left text-danger" id="myModalLabel"><i class="glyphicon glyphicon-warning-sign"></i> Lỗi</h4></div><div class="modal-body"><div class="text-danger text-center"><h3> Nhóm quản trị này không tồn tại</h3></div></div><div class="modal-footer"><div class="col-md-6"></div><div class="col-md-1"><button type="button" class="btn btn-default close" data-dismiss="modal">Thoát</button></div><div class="col-md-5"></div></div></div></div></div>']);

        
        }


        $data=Role::find($id);
        $permissions=Permission::all();

    $role_permissions=$data->perms()->pluck('id','id')->toArray();
     
      return view('backend.nhomquantri.sua',compact('permissions','data','role_permissions'));
    }
    // end
}
