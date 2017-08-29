<?php $index=1; ?>
@extends('frontend.layout.index')

@section('thuvien')
    <link type="text/css" rel="stylesheet" href="{{ url('public/frontend/giohang/css/giohang.css')}}" />
   <script type="text/javascript">

$(document).ready(function() {
    //raty
    $('.capnhatgiohang').click(function() {
             
         var rowid=$(this).attr('id');
         var qty = $(this).parent().parent().find('.qty').val();

                $.ajax({
                    url: '{!! url("capnhatgiohang") !!}',
                    type: 'GET',
                    data: {'id':rowid,'qty':qty},
                    dataType: 'json',
                    success: function(data)
                    {
                         if(data.complete)
                         {
                          window.location="giohang";
                         }

                     } 
              });
             
          });
     
});
   </script>
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
     <div class="row">
        <div class="col-md-12 chitietsanpham" >
          <b ><i class="glyphicon glyphicon-shopping-cart"></i> GIỎ HÀNG</b>
        </div>
     </div><br>
     <div class="row">
         <div class="col-md-12">
     
              <table class="giohang   table-striped" >
                  <thead>
                      <tr>
                         <th width="13%" >Hành động</th>
                         <th width="45%" colspan="2">Hình ảnh + Tên sản phẩm</th>
                         <th width="15%">Đơn giá</th>
                         <th>Số lượng</th>
                         <th width="15%" class="hidden-xs">Thành tiền</th>
                      </tr>
                  </thead>
                  <tbody>

                     <?php 
                     $tong=0; 
                     ?>
                      @if(isset($cartItems)&&count($cartItems)>0)
                      <form method="post" action="">
                      {{ csrf_field() }}

                      @foreach($cartItems as $cartItem)
                         <tr class="sanpham">
                             <td>
                             <a  data-toggle="tooltip" title="Xóa sản phẩm" href="{!! route('xoahang',$cartItem->rowId) !!}" class="btn btn-danger luixuong" style="float: left;padding-bottom: 10px;"><i class="glyphicon glyphicon-remove"></i></a>
                             <a  data-toggle="tooltip" title="Cập nhật số lượng"  id="{!! $cartItem->rowId !!}"  class="capnhatgiohang btn btn-info luixuong " style="float: right; padding-bottom: 10px;"><i class="glyphicon glyphicon-refresh"></i></a></td>
                             <td width="10%" ><img src="{!! url('resources/upload/sanpham/anh_sanpham_to') !!}/{{$cartItem->options->img}}" style="width:100%;" class="hidden-xs"></td>
                             <td >{{$cartItem->name}} <br></td>
                             <td >{{ number_format($cartItem->price,3,'.','.')}} VNĐ</td>
                             <td width="12%"><input class="qty" type="number"  min=0 name="qty" size="1" value="{{$cartItem->qty}}"  style="width: 100%;" /></td>
                             <td class="hidden-xs">{{ number_format($cartItem->price*$cartItem->qty,3,'.','.')}} VNĐ</td>
                         </tr>
                         <?php $tong+=$cartItem->price*$cartItem->qty; ?>
                      @endforeach
                      </form>
                      @else
                        <tr class="sanpham">
                          <td colspan="6" style="font-weight: bold;font-size:20px; text-align: center;">Giỏ hàng này trống</td>
                        </tr>
                      @endif
                      <tr class="tong">
                         <td colspan="6">
                           Tổng cộng: {{ number_format($tong,3,'.','.')}} VNĐ
                         </td>
                      </tr>

                  </tbody>
              </table>            
         </div>
     </div><br>
     <div class="row">
       
                  @if(isset($cartItems)&&count($cartItems)>0)
      <div class="col-md-4 col-sm-4 col-xs-2">
            
        </div>
        <div class="col-md-2 col-sm-2 col-xs-4">

            <a href="{!! route('xoatatcahang') !!}" class="btn  btn-lg btn-success btn-mau">Xoá hết</a>
        </div>
        @else
       <div class="col-md-3 col-sm-3 col-xs-3">
            
        </div>
                    @endif

        <div class="col-md-2 col-sm-2 col-xs-4">
            @if(isset($cartItems)&&count($cartItems)>0)

            <a href="{!! url('muahang') !!}" class="btn btn-lg btn-success btn-mau">Mua hàng</a>
            @else
            <a href="{!! url('') !!}" class="btn btn-lg btn-success btn-mau">Xin mời mua hàng</a>

            @endif
        </div>
         <div class="col-md-5 col-sm-5 col-xs-2">
            
        </div>
     </div>
</div>

<!--end gio -->
@stop
@section('danhsach')


@stop