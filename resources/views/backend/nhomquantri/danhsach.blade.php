 @extends('backend.layout.index')
  @section('css')
     <link type="text/css" href="{{ url('public/backend/vendors/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet" />

 
 @endsection

 @section('script')
    <script src="{{ url('public/backend/vendors/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/vendors/datatables/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>

 @endsection
@section('title')
 <section class="content-header">
                <!--section starts-->
                <h2>Nhóm quản trị</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-fw fa-home"></i> Trang chủ
                        </a>
                    </li>
               
                    <li>
                        <a onclick="location.href='{{ route('backend.nhomquantri.danhsach')}}'" href="javascript:void(0)">Nhóm quản trị</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Nhóm quản trị
                            </h4>
                                <span class="pull-right">
                                 @permission('nhomquantri-them')                     

                                   <a onclick="location.href='{{ route('backend.nhomquantri.getThem')}}'" href="javascript:void(0)" class="btn btn-xs btn-success"><h7><i class="fa fa-plus"></i> THÊM MỚI</h7></a>
                                  @endpermission
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Stt</th>
                                            <th class="text-center">Nhóm quản trị</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=0; ?>
                                        @foreach($data as $val)
                                        <?php $stt++; ?>
                                         <tr>
                                             <td class="text-left">{!! $stt !!}</td>
                                           <td class="text-left">{{ $val['description'] }}</td>

                                           <td class="text-center" >                                                                        @permission('nhomquantri-chitiet')                     

                                             <a   class="btn btn-sm btn-success" onclick="location.href='{!! route('backend.nhomquantri.getChitiet',$val['id']) !!}'" href="javascript:void(0)" ><i class="glyphicon glyphicon-info-sign"></i> Chi tiết</a>
                                            @endpermission                                                                                     

                                        @if($val['id']>0)
                                           @permission('nhomquantri-sua')   
                                             <a   class="btn btn-sm btn-primary" onclick="location.href='{!! route('backend.nhomquantri.getSua',$val['id']) !!}'" href="javascript:void(0)" ><i class="glyphicon glyphicon-edit"></i> Sửa</a>
                                            @endpermission                                                                   @permission('nhomquantri-xoa')                     

                                             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{ $val['id'] }}"><i class="fa fa-trash-o"></i> Xóa</button>

<!-- Modal  xóa-->
<div class="modal fade" id="{{ $val['id'] }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title  text-primary text-left" id="myModalLabel"><i class="glyphicon glyphicon-question-sign"></i> Thông báo</h4>
      </div>
      <div class="modal-body">
          <div class="text-danger text-center"><h3> Bạn có chắc chắn muốn xóa <b class="text-info">{{ $val['description'] }}</b> không ?</h3></div>
      </div>
      <div class="modal-footer">
      <center>
        <a type="button" class="btn btn-primary" onclick="location.href='{!! route('backend.nhomquantri.getXoa',$val['id']) !!}'" href="javascript:void(0)" >Có</a>

        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--end Modal xóa-->
                                            @endpermission
@endif

                                             </td>
                                         </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
         
@endsection
@section('script')

@endsection
@section('css')

@endsection
