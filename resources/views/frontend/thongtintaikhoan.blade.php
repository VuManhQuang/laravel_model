<?php $index='login'; ?>
@extends('frontend.layout.index')

@section('thuvien')
<style type="text/css">
  .chinhfont .row div {
  font-size:18px;font-weight: bold;
  }
</style>
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
<div class="container-fluid chinhfont" style="margin-top:3px;">
              <div class="row text-center">
               <div class="col-md-3 col-sm-3">
        
      </div>
        <div class="col-md-5 col-sm-6 chitietsanpham" >
          <b><i class="glyphicon glyphicon-user"></i> THÔNG TIN TÀI KHOẢN</b>
        </div>
     </div><br>
      <div class="row">
      <div class="col-md-3 col-sm-3">
        
      </div>
       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6" >
           Họ và tên:
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-info" >
          {!! Auth::user()->username !!}
       </div>
      
     </div><br>
     <div class="row">
     <div class="col-lg-3 col-md-3 col-sm-3">
        
      </div>
       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
           Email:
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-info">
          {!! Auth::user()->email !!}
       </div>
     </div><br>
     <div class="row">
     <div class="col-lg-3 col-md-3 col-sm-3">
        
      </div>
       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
           Điện thoại:
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-info">
          {!! Auth::user()->phone_user !!}
       </div>
     </div><br>
     <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
        
      </div>
       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
    
           Địa chỉ:
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-info">
          {!! Auth::user()->diachi_user !!}
       </div>
     </div><br>
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3">
        
      </div>
       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
           Thành viên:
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-info">
           @if(Auth::user()->kieu==0)
          {!! "Bình thường" !!}
          @endif
       </div>
     </div><br>
     <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3">
          
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
          <a href="{{ url('suathongtin') }}" style="font-size: 15px;" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil" ></i> Sửa thông tin</a>
        </div>
         <div class="col-lg-1 col-md-1 col-sm-1">
          
        </div>
         <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
          <a href="{!! url('thaydoimatkhau') !!}"  style="font-size: 15px;"  class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-hand-right" ></i> Thay mật khẩu</a>
        </div>
       
     </div>

</div>

<!--end gio -->
@stop
@section('danhsach')


@stop