<?php $index='dangky'; ?>
@extends('frontend.layout.index')

@section('thuvien')

@stop
@section('script')

@stop
@section('quangcao_chitietsanpham')
 <!--Quảng cáo-->
<br>
<div class="row hidden-xs">
  <div class="col-md-12">
      @if(isset($quangcao1)&&count($quangcao1))  

   <a href="{{ $quangcao1['link'] }}">
    <img src="{{url('resources/upload/quangcao') }}/{{$quangcao1['anh_quangcao']}}" class="img-responsive" style="height: 180px; width: 100%;">
   </a>
  @endif
  </div>
</div>
<br>
<div class="row hidden-xs">
  <div class="col-md-12">
      @if(isset($quangcao2)&&count($quangcao2))  

   <a href="{{ $quangcao2['link'] }}">
    <img src="{{url('resources/upload/quangcao') }}/{{$quangcao2['anh_quangcao']}}" class="img-responsive" style="height: 180px; width: 100%;" >
  </a>
  @endif
  </div>
</div>
<!--end quảng cáo-->
@stop
@section('content')
<!-- giỏ-->
<div class="container-fluid" style="margin-top:3px;">
<form method="POST" action="{!! route('laptaikhoan') !!}" enctype="multipart/form-data">
                          {{ csrf_field() }}
              <div class="row">
        <div class="col-md-12 chitietsanpham" >
          <b ><i class="glyphicon glyphicon-pencil"></i> ĐĂNG KÝ TÀI KHOẢN</b>
        </div>
     </div><br>
     <div class="row">
       <div class="col-md-3 ">
           Email <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">
         <input type="email" name="email" class="form-control" placeholder="Trường email này bắt buộc, hãy nhập" value="{!! old('email') !!}">
         <br><span class="text-danger">{!! $errors->first('email') !!}</span>
       </div>
     </div><br>
       <div class="row">
       <div class="col-md-3 ">
           Mật khẩu <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">
         <input type="password" name="password" class="form-control" placeholder="Trường mật khẩu này bắt buộc, hãy nhập" value="{!! old('password') !!}">
        <br><span class="text-danger">{!! $errors->first('password') !!}</span>

       </div>
     </div><br>
        <div class="row">
       <div class="col-md-3 ">
           Nhập lại mật khẩu <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">
         <input type="password" name="laipassword" class="form-control" placeholder="Trường nhập lại mật khẩu này bắt buộc, hãy nhập" value="{!! old('laipassword') !!}">
                 <br><span class="text-danger">{!! $errors->first('laipassword') !!}</span>

       </div>
     </div><br>
    <div class="row">
       <div class="col-md-3 ">
           Họ và tên :
       </div>
       <div class="col-md-8">
         <input type="text" name="hovaten" class="form-control" placeholder="Mời bạn nhập họ và tên nếu cần" value="{!! old('hovaten') !!}">
       </div>
     </div><br>
     <div class="row">
       <div class="col-md-3 ">
           Số điện thoại <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">
         <input type="number" name="phone" class="form-control" placeholder="Trường nhập số điện thoại này bắt buộc, hãy nhập" value="{!! old('phone') !!}">
                         <br><span class="text-danger">{!! $errors->first('phone') !!}</span>

       </div>
     </div><br>
        <div class="row">
       <div class="col-md-3 ">
           Địa chỉ :
       </div>
       <div class="col-md-8">

       <textarea name="diachi" placeholder="Mời bạn nhập địa chỉ" class="form-control" rows="8">{!! old('diachi') !!}</textarea>
       </div>
     </div><br>
     <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
          <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-save" ></i> Đăng ký</button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
          
        </div>
     </div>
</form>

</div>

<!--end gio -->
@stop
@section('danhsach')


@stop