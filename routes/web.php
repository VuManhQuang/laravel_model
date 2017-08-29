<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'backend'],function(){
    // login
    Route::get('login','Backend\LoginController@showLoginForm')->name('backend.login');
    Route::post('login','Backend\LoginController@login')->name('backend.login.submit');;
    Route::post('logout','Backend\LoginController@logout')->name('backend.logout');;
   // end login
    // giao dịch
    Route::group(['prefix'=>'giaodich','middleware'=>'auth:admin'],function(){

       Route::get('danhsach',['as'=>'backend.giaodich.danhsach','middleware'=>'permission:giaodich-danhsach','uses'=>'MpgiaodichController@getDanhsach']);
       Route::get('them',['as'=>'backend.theloai.getThem','middleware'=>'permission:theloai-them','uses'=>'MptheloaiController@getThem']);
       Route::post('them',['as'=>'backend.theloai.postThem','uses'=>'MptheloaiController@postThem']);
       Route::get('xoa/{id}',['as'=>'backend.theloai.getXoa','middleware'=>'permission:theloai-xoa','uses'=>'MptheloaiController@getXoa']);
       Route::get('sua/{id}',['as'=>'backend.theloai.getSua','middleware'=>'permission:theloai-sua','uses'=>'MptheloaiController@getSua']);
       Route::post('sua/{id}',['as'=>'backend.theloai.postSua','uses'=>'MptheloaiController@postSua']);
    });
   // end giao dịch
    // forget pass
    Route::post('password/email', 'Backend\ForgotPasswordController@sendResetLinkEmail')->name('backend.password.email');
    Route::get('password/reset', 'Backend\ForgotPasswordController@showLinkRequestForm')->name('backend.password.request');
    Route::post('/password/reset', 'Backend\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Backend\ResetPasswordController@showResetForm')->name('backend.password.reset');
    // end forget pass

    Route::group(['prefix'=>'theloai','middleware'=>'auth:admin'],function(){

       Route::get('danhsach',['as'=>'backend.theloai.danhsach','middleware'=>'permission:theloai-danhsach','uses'=>'MptheloaiController@getDanhsach']);
       Route::get('them',['as'=>'backend.theloai.getThem','middleware'=>'permission:theloai-them','uses'=>'MptheloaiController@getThem']);
       Route::post('them',['as'=>'backend.theloai.postThem','uses'=>'MptheloaiController@postThem']);
       Route::get('xoa/{id}',['as'=>'backend.theloai.getXoa','middleware'=>'permission:theloai-xoa','uses'=>'MptheloaiController@getXoa']);
       Route::get('sua/{id}',['as'=>'backend.theloai.getSua','middleware'=>'permission:theloai-sua','uses'=>'MptheloaiController@getSua']);
       Route::post('sua/{id}',['as'=>'backend.theloai.postSua','uses'=>'MptheloaiController@postSua']);
    });

    Route::group(['prefix'=>'sanpham','middleware'=>'auth:admin'],function(){
Route::get('timkiem',['as'=>'backend.sanpham.search','middleware'=>'permission:sanpham-timkiem','uses'=>'SanphamController@search']);
       Route::get('/',['as'=>'backend.sanpham','middleware'=>'permission:sanpham-danhsach','uses'=>'SanphamController@index']);
       Route::get('them',['as'=>'backend.sanpham.create','middleware'=>'permission:sanpham-them','uses'=>'SanphamController@create']);
       Route::post('them',['as'=>'backend.sanpham.store','uses'=>'MptheloaiController@store']);
       Route::delete('xoa/{id}',['as'=>'backend.sanpham.destroy','middleware'=>'permission:sanpham-xoa','uses'=>'SanphamController@destroy']);
       Route::get('sua/{id}',['as'=>'backend.sanpham.edit','middleware'=>'permission:sanpham-sua','uses'=>'SanphamController@edit']);
       Route::put('sua/{id}',['as'=>'backend.sanpham.update','uses'=>'SanphamController@update']);
    });
    Route::group(['prefix'=>'nhomquantri','middleware'=>'auth:admin'],function(){
     Route::get('danhsach',['as'=>'backend.nhomquantri.danhsach','middleware'=>'permission:nhomquantri-danhsach','uses'=>'RoleController@getDanhsach']);
       Route::get('them',['as'=>'backend.nhomquantri.getThem','middleware'=>'permission:nhomquantri-them','uses'=>'RoleController@getThem']);
       Route::post('them',['as'=>'backend.nhomquantri.postThem','uses'=>'RoleController@postThem']);
       Route::get('xoa/{id}',['as'=>'backend.nhomquantri.getXoa','middleware'=>'permission:nhomquantri-xoa','uses'=>'RoleController@getXoa']);
       Route::get('sua/{id}',['as'=>'backend.nhomquantri.getSua','middleware'=>'permission:nhomquantri-sua','uses'=>'RoleController@getSua']);
       Route::post('sua/{id}',['as'=>'backend.nhomquantri.postSua','uses'=>'RoleController@postSua']);
           Route::get('chitiet/{id}',['as'=>'backend.nhomquantri.getChitiet','middleware'=>'permission:nhomquantri-chitiet','uses'=>'RoleController@getChitiet']);

    });
});
Route::group(['prefix'=>'frontend'],function(){
    // login

Route::get('player/{id}', 'PageController@player');

});



Route::get('/abc',function(){
    return bcrypt('123456');
});
Auth::routes();

Route::get('/', 'PageController@index');
Route::get('gioi_thieu', 'PageController@gioithieu');
Route::get('huong_dan', 'PageController@huongdan');
Route::get('khuyenmai', 'PageController@khuyenmai');
Route::get('dangky', 'UserController@dangky');
Route::get('login', 'UserController@login');
Route::get('lienhe', 'UserController@lienhe');
Route::get('muahang', 'UserController@muahang');
Route::post('dathang',['as'=>'dathang','uses'=>'UserController@dathang']);

Route::get('thongtintaikhoan', 'UserController@thongtintaikhoan');
Route::get('thaydoimatkhau', 'UserController@thaydoimatkhau');
Route::get('suathongtin', 'UserController@suathongtin');

Route::post('laptaikhoan',['as'=>'laptaikhoan','uses'=>'UserController@laptaikhoan']);
Route::post('thuchiendangnhap',['as'=>'thuchiendangnhap','uses'=>'UserController@thuchiendangnhap']);
Route::get('logout', 'UserController@logout');

Route::get('timkiem_tudong','PageController@timkiem_tudong');
Route::get('danhsach/{alias}',['as'=>'danhsach','uses'=>'PageController@danhsach']);
Route::get('chitietsanpham/{alias}',['as'=>'chitietsanpham','uses'=>'PageController@chitietsanpham']);

Route::post('timkiem',['as'=>'timkiem','uses'=>'PageController@timkiem']);
Route::get('raty',['as'=>'raty','uses'=>'CartController@raty']);

Route::get('muahang/{alias}',['as'=>'muahang','uses'=>'CartController@muahang']);
Route::get('xoahang/{rowId}',['as'=>'xoahang','uses'=>'CartController@xoahang']);
Route::get('xoatatcahang',['as'=>'xoatatcahang','uses'=>'CartController@xoatatcahang']);


Route::get('giohang',['as'=>'giohang','uses'=>'CartController@giohang']);
Route::get('capnhatgiohang',['as'=>'capnhatgiohang','uses'=>'CartController@capnhatgiohang']);
Route::get('login/facebook', 'UserController@redirectToProvider');
Route::get('login/facebook/callback', 'UserController@handleProviderCallback');
Route::get('login/google', 'UserController@googleredirectToProvider');
Route::get('login/google/callback', 'UserController@googlehandleProviderCallback');