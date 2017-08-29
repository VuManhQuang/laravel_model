 @extends('backend.layout.index')
  @section('css')
     <link type="text/css" href="{{ url('public/backend/vendors/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet" />

 
 @endsection
 @section('script')

 @endsection
@section('title')
   <section class="content-header">
        <!--section starts-->
                <h2>Sản phẩm</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-fw fa-home"></i> Trang chủ
                        </a>
                    </li>
               
                    <li>
                        <a onclick="location.href='{{ route('backend.sanpham')}}'" href="javascript:void(0)">Sản phẩm</a>
                    </li>
                </ol>
    </section>
@endsection
  @section('content')
        <div class="col-lg-12">
                        <!-- Basic charts strats here-->

                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Sản phẩm
                            </h4>

                                <span class="pull-right">
   @permission('sanpham-them')                     
   <a onclick="location.href='{{ route('backend.sanpham.create')}}'" href="javascript:void(0)" class="btn btn-xs btn-success"><h7><i class="fa fa-plus"></i> THÊM MỚI</h7></a>
   @endpermission
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                  
                <form id="timkiemsp"  action="{!! route('backend.sanpham.search') !!}" method="GET" class="form-horizontal" enctype="multipart/form-data" >
                  {!! csrf_field() !!}
                <div class=" input-group input-group-sm" style="margin: 5px 0 5px 5px;">
                
                  <?php echo Form::text('key_search', null, [
                    'class' => 'ui-autocomplete-input form-control',
                    'placeholder' => 'TÌM KIẾM THEO TÊN SẢN PHẨM HOẶC TÊN THỂ LOẠI',
                  ]) ?>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button>
                  </span>
              </div>
              </form>
                              </div>  
                            </div>
                            <div class=" table-responsive">
                                <table class="table table-bordered  text-left" style="border-top:1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="5%">Stt</th>
                                            <th class="text-center" width="15%">Tên</th>
                                            <th class="text-center">Ảnh</th>

                                            <th class="text-center">Giá gốc</th>
                                            <th class="text-center">Giá giảm</th>
                                            <th class="text-center">Thể tích</th>

                                            <th class="text-center" width="15%">Thể loại</th>
                                            <th class="text-center" >Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=0; ?>
                                        @foreach($data as $val)
                                        <?php $stt++; ?>
                                         <tr>
                                             <td class="text-left">{!! $stt !!}</td>
                                             <td class="text-left">{!! $val['ten_sanpham'] !!}</td>
                                             <td class="text-left"><img class="img-responsive" alt="500x90" style="width: 80px;height: 80px;" src="{{ url('public\upload\sanpham\anh_sanpham_to') }}\{{ $val['anh_sanpham_to'] }}"></td>
                                         	 <td class="text-left">{{number_format($val['gia'],3,'.','.') }} VNĐ</td>
                                             <td class="text-left text-danger" style="text-decoration: line-through;">{{number_format($val['discount'],3,'.','.') }} VNĐ</td>
                                            <td class="text-left">{!! $val['the_tich'] !!}</td>

                                             <td> 
                             
                                <?php
                                    $parent=DB::table('mptheloais')->where('id_danhmuc',$val["id_danhmuc"])->first();
                                    echo $parent->ten_danhmuc;
                                ?>

                                             </td>
                                         	 <td class="text-center" >
                                             @permission('sanpham-chitiet')                     
                                             <button   class="btn btn-sm btn-success" data-toggle="modal" data-target="#chitiet{{ $val['id_danhmuc'] }}"><i class="glyphicon glyphicon-info-sign"></i> Chi tiết</button>
<!-- Modal  chi tiêt-->
<div class="modal fade" id="chitiet{{ $val['id_danhmuc'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="myModalLabel"> Chi tiết về sản phẩm <b class="text-success">{{ $val['ten_sanpham'] }}</b></h4>
      </div>
      <div class="modal-body">
              <div class="panel-body table-responsive">
                    <table class="text-left">
                                    <thead>
                                        <tr>
                                            <td >Tên</td>
                                            <td><b class="text-primary">{{ $val['ten_sanpham'] }}</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                             <td >
                                                 Ảnh
                                             </td>
                                             <td> 
                                                <img class="img-responsive" alt="500x90" style="width: 80px;height: 80px;" src="{{ url('public\upload\sanpham\anh_sanpham_to') }}\{{ $val['anh_sanpham_to'] }}">                                             
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Giá gốc</td>
                                            <td><b class="text-primary">{{number_format($val['gia'],3,'.','.') }} VNĐ</b></td>
                                        </tr>
                                        <tr>
                                            <td >Giá giảm</td>
                                            <td><b class="text-danger" style="text-decoration: line-through;">{{number_format($val['discount'],3,'.','.') }} VNĐ</b></td>
                                        </tr>
                                        <tr>
                                            <td >Thể tích</td>
                                            <td><b class="text-primary">{{ $val['the_tich'] }}</b></td>
                                        </tr>
                                         <tr>
                                            <td >Thể loại</td>
                                            <td><b class="text-primary" >  
                           
                                <?php
                                    $parent=DB::table('mptheloais')->where('id_danhmuc',$val["id_danhmuc"])->first();
                                    echo $parent->ten_danhmuc;
                                ?>
                                </b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b class="text-primary text-center"><h3>Nội dung</h3></b><br><?php echo $val['noidung_sanpham'] ?></td>
                                        </tr>
                                    </tbody>
                    </table>
             </div>
                                         
      </div>
      <div class="modal-footer">
      <center>

        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--end Modal chi tiết-->
                                                 @endpermission                    

                                                 @permission('sanpham-sua')                     

                                             <a   class="btn btn-sm btn-primary" onclick="location.href='{!! route('backend.sanpham.edit',$val['id_sanpham']) !!}'" href="javascript:void(0)" ><i class="glyphicon glyphicon-edit"></i> Sửa</a>
                                                 @endpermission                    
                                                 @permission('sanpham-xoa')                     

                                             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{ $val['id_sanpham'] }}"><i class="fa fa-trash-o"></i> Xóa</button>

<!-- Modal  xóa-->
<div class="modal fade" id="{{ $val['id_sanpham'] }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title  text-primary text-left" id="myModalLabel"><i class="glyphicon glyphicon-question-sign"></i> Thông báo</h4>
      </div>
      <div class="modal-body">
          <div class="text-danger text-center"><h3> Bạn có chắc chắn muốn xóa <b class="text-info">{{ $val['ten_sanpham'] }}</b> không ?</h3></div>
      </div>
      <div class="modal-footer">
      <center>
        <a type="button" class="btn btn-primary" onclick="location.href='{!! route('backend.sanpham.destroy',$val['id_sanpham']) !!}'" href="javascript:void(0)" >Có</a>

        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--end Modal xóa-->
                                                 @endpermission                    


                                             </td>
                                         </tr>
                                        @endforeach
                                    <tr >

                                           <td colspan="8">{!! $data->links() !!}</td>

                                    </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
         
@endsection