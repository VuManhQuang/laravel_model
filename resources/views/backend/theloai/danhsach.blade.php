 @extends('backend.layout.index')
 @section('css')
     <link type="text/css" href="{{ url('public/backend/vendors/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet" />

 
 @endsection

 @section('script')
    <script src="{{ url('public/backend/vendors/datatables/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>

 @endsection
@section('title')
 <section class="content-header">
                <!--section starts-->
                <h2>Thể loại</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-fw fa-home"></i> Trang chủ
                        </a>
                    </li>
               
                    <li>
                        <a onclick="location.href='{{ route('backend.theloai.danhsach')}}'" href="javascript:void(0)">Thể loại</a>
                    </li>
                </ol>
            </section>
@endsection
  @section('content')

                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Thể loại
                            </h4>

                                <span class="pull-right">
    @permission('theloai-them')                     
   <a onclick="location.href='{{ route('backend.theloai.getThem')}}'" href="javascript:void(0)" class="btn btn-xs btn-success"><h7><i class="fa fa-plus"></i> THÊM MỚI</h7></a>
   @endpermission
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Stt</th>
                                            <th class="text-center">Tên</th>
                                            <th class="text-center">Thứ tự</th>

                                            <th class="text-center" >Thể loại cha</th>
                                            <th class="text-center" >Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=0; ?>
                                        @foreach($data as $val)
                                        <?php $stt++; ?>
                                         <tr>
                                             <td class="text-left">{!! $stt !!}</td>
                                         	 <td class="text-left">{{ $val['ten_danhmuc'] }}</td>
                                             <td class="text-left">{{ $val['thutu'] }}</td>

                                      <!--       <td class="text-left"><img class="img-responsive" alt="500x90" style="width: 350px;height: 90px;" src="{{ url('resources/upload/danhmuc/banner_anhdai') }}/{{ $val['banner_anhdai'] }}"></td> -->
                                             <td> 
                                @if($val["parent_id"]==0)
                                   {!! "Đây là danh mục cha" !!}
                                @else
                                <?php
                                    $parent=DB::table('mptheloais')->where('id_danhmuc',$val["parent_id"])->first();
                                    echo $parent->ten_danhmuc;
                                ?>
                                @endif

                                             </td>
                                         	 <td class="text-center" >
                                             @permission('theloai-chitiet')                     
                                             <button   class="btn btn-sm btn-success" data-toggle="modal" data-target="#chitiet{{ $val['id_danhmuc'] }}"><i class="glyphicon glyphicon-info-sign"></i> Chi tiết</button>
<!-- Modal  chi tiêt-->
<div class="modal fade" id="chitiet{{ $val['id_danhmuc'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="myModalLabel"> Chi tiết về thể loại <b class="text-success">{{ $val['ten_danhmuc'] }}</b></h4>
      </div>
      <div class="modal-body">
              <div class="panel-body table-responsive">
                    <table class="table  text-left" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <td >Tên</td>
                                            <td><b class="text-primary">{{ $val['ten_danhmuc'] }}</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                             <td >
                                                 Ảnh
                                             </td>
                                             <td> 
                                             <img class="img-responsive" alt="500x100" style="width: 500px;height: 100px;" src="{{ url('resources/upload/danhmuc/banner_anhdai') }}/{{ $val['banner_anhdai'] }}">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td >Thứ tự</td>
                                            <td><b class="text-primary">{{ $val['thutu'] }}</b></td>
                                        </tr>
                                         <tr>
                                            <td >Thuộc</td>
                                            <td><b class="text-primary">  
                                @if($val["parent_id"]==0)
                                   {!! "Đây là danh mục cha" !!}
                                @else
                                <?php
                                    $parent=DB::table('mptheloais')->where('id_danhmuc',$val["parent_id"])->first();
                                    echo $parent->ten_danhmuc;
                                ?>
                                @endif</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b class="text-primary text-center"><h3>Nội dung</h3></b><br><?php echo $val['noidung_danhmuc'] ?></td>
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

                                                 @permission('theloai-sua')                     

                                             <a   class="btn btn-sm btn-primary" onclick="location.href='{!! route('backend.theloai.getSua',$val['id_danhmuc']) !!}'" href="javascript:void(0)" ><i class="glyphicon glyphicon-edit"></i> Sửa</a>
                                                 @endpermission                    
                                                 @permission('theloai-xoa')                     

                                             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{ $val['id_danhmuc'] }}"><i class="fa fa-trash-o"></i> Xóa</button>

<!-- Modal  xóa-->
<div class="modal fade" id="{{ $val['id_danhmuc'] }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title  text-primary text-left" id="myModalLabel"><i class="glyphicon glyphicon-question-sign"></i> Thông báo</h4>
      </div>
      <div class="modal-body">
          <div class="text-danger text-center"><h3> Bạn có chắc chắn muốn xóa <b class="text-info">{{ $val['ten_danhmuc'] }}</b> không ?</h3></div>
      </div>
      <div class="modal-footer">
      <center>
        <a type="button" class="btn btn-primary" onclick="location.href='{!! route('backend.theloai.getXoa',$val['id_danhmuc']) !!}'" href="javascript:void(0)" >Có</a>

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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
         
@endsection