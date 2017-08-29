            <section class="sidebar">
                <div id="menu" role="navigation">
                    <div class="nav_profile">
                        <div class="media profile-left">
                            <a class="pull-left profile-thumb" href="#">
                                <img src="{{ url('public/backend/img/admin/16002952_750640788424041_5708182976617268282_n.jpg')}}" class="img-circle" alt="User Image">
                            </a>
                            <div class="content-profile">
                           
                                <h4 class="media-heading">{!! Auth::user()->name !!}</h4>
                                <span class="text-default">{!! Auth::user()->username !!}</span>
                             
                            </div>
                        </div>
                    </div>
                    <ul class="navigation">
                        <li>
                            <a href="index.html">
                                <i class="text-primary menu-icon fa fa-fw fa-dashboard"></i>
                                <span class="mm-text ">Bảng điều khiển</span>
                            </a>
                        </li>
                         @permission('giaodich-danhsach')                     

                        <li>
                            <a href="{{ route('backend.giaodich.danhsach')}}">
                                <i class="text-danger fa fa-fw fa-money"></i>
                                <span class="mm-text">Giao dịch</span>
                            </a>
                        </li>
                        @endpermission
                        @permission('sanpham-danhsach')                     

                        <li>
                            <a href="{{ route('backend.sanpham')}}">
                                <i class="text-success glyphicon glyphicon-th-large"></i>
                                <span class="mm-text">Quản lý sản phẩm</span>
                            </a>
                        </li>
                        @endpermission

                        <li class="menu-dropdown ">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Quản lý nhóm</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                             @permission('nhomquantri-danhsach')                     

                                <li >
                                    <a href="{{ route('backend.nhomquantri.danhsach')}}">
                                        <i class="text-primary fa fa-fw fa-users"></i> Nhóm quản trị
                                    </a>
                                </li>
                             @endpermission
                             @permission('theloai-danhsach')                     
                                <li >
                                    <a  href="{{ route('backend.theloai.danhsach')}}">
                                        <i class="text-primary menu-icon fa fa-inbox"></i> Thể loại sản phẩm
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            @endpermission
    
                            </ul>
                        </li>
                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-danger menu-icon fa fa-fw fa-calendar"></i>
                                <span class="mm-text">Sự kiện</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="events_list.html">
                                        <i class="text-primary menu-icon fa fa-fw fa-list"></i> Khuyến mãi
                                    </a>
                                </li>
                                <li>
                                    <a href="event_item.html">
                                        <i class="text-info menu-icon glyphicon glyphicon-gift"></i> Quà tặng
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown ">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Báo cáo thống kê</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="admin_userlist.html">
                                        <i class="text-primary menu-icon fa fa-fw fa-newspaper-o"></i> Thống kê doanh số
                                    </a>
                                </li>
                                <li >
                                    <a  href="{{ route('backend.theloai.danhsach')}}">
                                        <i class="text-primary menu-icon fa fa-fw fa-newspaper-o"></i> Thống kê tồn kho
                                    </a>
                                </li>
                             
                            </ul>
                        </li>
                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-default menu-icon fa fa-fw fa-users"></i>
                                <span class="mm-text">Tài khoản</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                            
                                <li>
                                    <a href="admin_userprofile.html">
                                        <i class="text-success fa fa-fw fa-user"></i> Ban quản trị
                                    </a>
                                </li>
                                <li>
                                    <a href="add_users.html">
                                        <i class="text-info fa fa-fw fa-user"></i> Thành viên
                                    </a>
                                </li>
                         
                            </ul>
                        </li>
                
                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-primary menu-icon fa fa-fw fa-gear"></i>
                                <span class="mm-text">Hệ thống</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="gallery.html">
                                        <i class="text-primary menu-icon fa fa-sitemap"></i> Menu
                                    </a>
                                </li>
                                <li>
                                    <a href="gallery.html">
                                        <i class="text-success fa fa-fw fa-file-image-o"></i> Slide
                                    </a>
                                </li>
                                <li>
                                    <a href="admin_courseschedule.html">
                                        <i class="text-primary fa fa-fw fa-th"></i> Giới thiệu
                                    </a>
                                </li>
                                <li>
                                    <a href="courses.html">
                                        <i class="text-success fa fa-fw fa-indent"></i> Hướng dẫn
                                    </a>
                                </li>
                              
                                <li>
                                    <a href="gallery.html">
                                        <i class="text-success fa fa-fw fa-info-circle"></i> Hỗ trợ trực tuyến
                                    </a>
                                </li>

                            </ul>
                        </li>
                       
                    </ul>
                    <!-- / .navigation -->
                </div>
                <!-- menu -->
            </section>