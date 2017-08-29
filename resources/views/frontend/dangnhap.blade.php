<?php $index='login'; ?>
@extends('frontend.layout.index')

@section('thuvien')
    <link rel="stylesheet" href="{{ url('public/frontend/checkbox/css/checkbox.css')}}"> <!-- Resource style -->

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
<form method="POST" action="{!! route('thuchiendangnhap') !!}" enctype="multipart/form-data">
                          {{ csrf_field() }}
              <div class="row">
        <div class="col-md-12 chitietsanpham text-center" >
          <b ><i class="glyphicon glyphicon-user"></i> ĐĂNG NHẬP TÀI KHOẢN</b>
        </div>
     </div><br>
     <div class="row">
     <div class="col-md-2">
          
        </div>
       <div class="col-md-2 " style="padding-top: 8px;">
           Email <span class="text-danger">*</span>:
       </div>
       <div class="col-md-5">
         <input type="email" name="email" class="form-control" placeholder="Trường email này bắt buộc, hãy nhập" value="{!! old('email') !!}">
         <br><span class="text-danger">{!! $errors->first('email') !!}</span>
       </div>
     </div><br>
       <div class="row">
       <div class="col-md-2">
          
        </div>
       <div class="col-md-2 " style="padding-top: 8px;">
           Mật khẩu <span class="text-danger">*</span>:
       </div>
       <div class="col-md-5">
         <input type="password" name="password" class="form-control" placeholder="Trường mật khẩu này bắt buộc, hãy nhập" value="{!! old('password') !!}">
        <br><span class="text-danger">{!! $errors->first('password') !!}</span>

       </div>
     </div><br>
    <div class="row">
        <div class="col-md-2">
          
        </div>
        <div class="col-md-4 ">
          <div class="checkbox">
            <label style="font-size: 1.2em">
                <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                Lưu mật khẩu
            </label>
        </div>
         
        </div>
         <div class="col-md-4 ">
          <div class="checkbox">
            <label style="font-size: 1.2em">
                <a href="{!! url('lienhe') !!}">Quên mật khẩu ?</a>
            </label>
        </div>
         
        </div>
    </div><br>
     <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 ">
          
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 " style="margin-bottom:10px;">
          <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hand-right" ></i> Đăng Nhập</button>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 " style="margin-bottom:10px;">
           <a href="{!! url('login/facebook') !!}" class="btn btn-primary"><i class="fa fa-facebook-square" ></i> Đăng Nhập Facebook</a>
        </div>

        <div class="col-xs-1 ">
          
        </div>
     </div>
</form>

</div>

<!--end gio -->
@stop
@section('danhsach')


@stop