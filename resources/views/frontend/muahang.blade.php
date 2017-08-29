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
                    <?php 
                     $tong=0; 
                     ?>
                      @foreach($cartItems as $cartItem)
                        <?php $tong+=$cartItem->price*$cartItem->qty; ?>

                      @endforeach
<div class="container-fluid" style="margin-top:3px;">
<form method="POST" action="{!! route('dathang') !!}" enctype="multipart/form-data">
                          {{ csrf_field() }}
              <div class="row">
        <div class="col-md-12 chitietsanpham" >
          <b ><i class="glyphicon glyphicon-pencil"></i> Thông tin nhận hàng</b>
        </div>
     </div><br>
          <div class="row">
       <div class="col-md-3 ">
           Tổng tiền thanh toán:
       </div>
       <div class="col-md-8">
         <b class="text-danger" style="font-size: 20px; font-weight: bold;">{{ number_format($tong,3,'.','.')}} VNĐ </b>
       </div>
     </div><br>
     <div class="row">
       <div class="col-md-3 ">
           Email <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">
         <input type="email" name="email" class="form-control" placeholder="Trường email này bắt buộc, hãy nhập"  value="{!! old('email',Auth::guard('web')->check() ? Auth::user()->email : null) !!}">
         <br><span class="text-danger">{!! $errors->first('email') !!}</span>
       </div>
     </div><br>
    <div class="row">
       <div class="col-md-3 ">
           Họ và tên :
       </div>
       <div class="col-md-8">
         <input type="text" name="hovaten" class="form-control" placeholder="Mời bạn nhập họ và tên nếu cần" value="{!! old('hovaten',Auth::guard('web')->check() ? Auth::user()->username : null) !!}">
       </div>
     </div><br>
     <div class="row">
       <div class="col-md-3 ">
           Số điện thoại <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">
         <input type="number" name="phone" class="form-control" placeholder="Trường nhập số điện thoại này bắt buộc, hãy nhập" value="{!! old('phone',Auth::guard('web')->check() ? Auth::user()->phone_user : null) !!}">
                         <br><span class="text-danger">{!! $errors->first('phone') !!}</span>

       </div>
     </div><br>
        <div class="row">
       <div class="col-md-3 ">
           Địa chỉ nhận hàng <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8">

       <textarea name="diachi" placeholder="Nơi nhận hàng bắt buộc phải điền" class="form-control" rows="8">{!! old('diachi',Auth::guard('web')->check() ? Auth::user()->diachi_user : null) !!}</textarea>
                 <br><span class="text-danger">{!! $errors->first('diachi') !!}</span>

       </div>
     </div><br>
      <div class="row">
       <div class="col-md-3 ">
           Hình thức thanh toán <span class="text-danger">*</span>:
       </div>
       <div class="col-md-8"> 
       <select name="thanhtoan" class="form-control">
           <option value="">CHỌN CỔNG THANH TOÁN</option>
           @if(old('thanhtoan')=="OffLine")
           <option value="OffLine" selected>THANH TOÁN KHI NHẬN HÀNG</option>
           @else
          <option value="OffLine" >THANH TOÁN KHI NHẬN HÀNG</option>

           @endif
             @if(old('thanhtoan')=="OffLine")
           <option value="Bank" selected>THANH TOÁN BẰNG THẺ NGÂN HÀNG </option>
           @else
           <option value="Bank">THANH TOÁN BẰNG THẺ NGÂN HÀNG </option>

           @endif

       </select>
          <br><span class="text-danger">{!! $errors->first('thanhtoan') !!}</span>

       </div>
     </div><br>
     <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
          <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-save" ></i> Đặt hàng</button>
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