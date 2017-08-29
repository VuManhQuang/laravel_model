 @extends('backend.layout.index')
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
                    <li>
                        <a onclick="location.href='{{ route('backend.nhomquantri.getThem')}}'" href="javascript:void(0)">Thêm nhóm quản trị</a>
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
                                <i class="fa fa-fw fa-file-text-o" aria-hidden="true"></i> Thêm nhóm quản trị
                            </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                        <form  action="{!! route('backend.nhomquantri.getThem') !!}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                          {{ csrf_field() }}
                                 <div class="form-body">
                                                <div class="form-group">
                                                    <label for="ten" class="col-md-3 control-label">
                                                       Tên nhóm quản trị
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-file-text-o"></i>
                                                            </span>
                                                            <input id="name" type="text" name="name" class="form-control" placeholder="Mời bạn nhập tên nhóm quản trị"  value="{!! old('name') !!}" >
                                                        </div>
                                                        <span class="text-danger"><?php echo $errors->first('name') ?>
                                                        </span>
                                                    </div>
                                                </div>
                                              
                                           <div class="form-group">
                                                    <label for="ten" class="col-md-3 control-label">
                                                       Quyền truy cập
                                                    </label>
                                                    <div class="col-md-7">

                                                        @foreach($permissions as $permission)
                                                            <div class="checkbox text-left">
                                                                <label>
                                                                 <input  type="checkbox" name="permission[]"   value="{{ $permission->id }}" > {{$permission->display_name}}                                                                
                                                                 </label>
                                                            </div>
                                                           
                                                         @endforeach
                                                    </div>
                                                </div>
                                </div>
                               <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-7">
                                                             <button type="submit" class="btn btn-lg btn-primary" >Thêm</button>
                                                              <a class="btn btn-lg btn-danger" onclick="location.href='{{ route('backend.nhomquantri.danhsach')}}'" href="javascript:void(0)"> Thoát</a>
                                                   
                                                             <input type="reset" id="add-news-reset-editable" class="btn btn-lg btn-default reset-styles" value="Reset">
                                                      
                                                    </div>
                                                </div>
                                </div>
                   
                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
@endsection
@section('script')
    <script src="{{ url('public/backend/vendors/holder/holder.js')}}" type="text/javascript"></script>
        <script src="{{ url('public/backend/js/custom_js/courses.js')}}" type="text/javascript"></script>

@endsection
@section('css')

@endsection
