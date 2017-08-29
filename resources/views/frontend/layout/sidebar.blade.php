
<div class=" cd-dropdown-wrapper" >
             <b class="tieude">
            <i class="glyphicon glyphicon-align-justify"></i> DANH MỤC SẢN PHẨM

             </b>
            <a class="cd-dropdown-trigger " href="#0" style="text-decoration: none;"><i class="glyphicon glyphicon-align-justify"></i> DANH MỤC SẢN PHẨM</a>
            <!-- style="min-height: 250px; overflow-y:scroll;"-->
            <nav class=" cd-dropdown danhmuc navigation" >
                <h2>DANH MỤC SẢN PHẨM</h2>
                <a href="#0" class="cd-close">Close</a>
                <ul class="cd-dropdown-content ">
                      <?php 
                $theloai= DB::table('mptheloais')->where('parent_id',0)->orderBy('thutu', 'asc')->get()->toArray();
 
                      theloai_parent($theloai,0); 
                      ?>

      

                
                </ul> <!-- .cd-dropdown-content -->
            </nav> <!-- .cd-dropdown -->
        </div> <!-- .cd-dropdown-wrapper -->


@yield('quangcao_chitietsanpham')




