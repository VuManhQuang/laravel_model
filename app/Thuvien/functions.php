<?php 
 function stripUnicode($str){
      if(!$str) return false;
      $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '' =>'?|(|)|[|]|{|}|#|%|-|<|>|,|:|;|.|&|–|/|+'
      );

      foreach($unicode as $khongdau=>$codau) {
         $arr=explode("|",$codau);
         $str = str_replace($arr,$khongdau,$str);
      }
      return $str;
   }
         
function changeTitle($str){
   $str = trim($str);
   if ($str=="") return "";
      $str =str_replace('"','',$str);
      $str =str_replace("'",'',$str);
      $str = stripUnicode($str);
      $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');    // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
      $str = str_replace(' ','-',$str);
      
   return $str;
}
// danh sách thể loại select trên backend
function cate_parent($data,$parent=0,$str="--",$select=0,$id=0){
    foreach ($data as $key => $val) {
      if($val["parent_id"]==$parent){
         if($select!=0&&$val["id_danhmuc"]==$select){
                  echo"<option value='".$val["id_danhmuc"]."' selected>".$str."".$val["ten_danhmuc"]."</option>";

         }else{
            if($val["id_danhmuc"]!=$id){
      echo"<option value='".$val["id_danhmuc"]."'>".$str."".$val["ten_danhmuc"]."</option>";
        }
      }
       cate_parent($data,$val["id_danhmuc"],$str."--",$select,$id);
      }
    }
}
// lấy các id con
function getid_con($id){
        
          $dayidcon=$id;          
          $parent=DB::table('mptheloais')->where('parent_id',$id)->get()->toArray();
            
          if(count($parent)>0){
      
            foreach ($parent as $val) {
              # code... 
                 $dayidcon=$dayidcon." ".getid_con($val->id_danhmuc);

            }

          }
   
            return $dayidcon;
                
  
       
     
 }
// hiển thị lúc chọn danh sách sản phẩm cho thể loại  abc > abc1>abc2

function parent_chon($danhmucchon,$active){
       $parent=DB::table('mptheloais')->where('id_danhmuc',$danhmucchon->parent_id)->orderBy('thutu', 'asc')->first();
       if(count($parent)>0)
       {
           parent_chon($parent,0);
           if($active==1){
           echo"<a class='active'  href='".route('danhsach',$danhmucchon->alias).".html' title='".$danhmucchon->ten_danhmuc."'><div>".$danhmucchon->ten_danhmuc."</div></a>";
           }
           else
           {
         echo"<a href='".route('danhsach',$danhmucchon->alias).".html' title='".$danhmucchon->ten_danhmuc."'><div>".$danhmucchon->ten_danhmuc."</div></a>";
 
           }
       }
       else
       {
              if($active==1){
           echo"<a class='active'  href='".route('danhsach',$danhmucchon->alias).".html' title='".$danhmucchon->ten_danhmuc."'><div>".$danhmucchon->ten_danhmuc."</div></a>";
           }
           else
           {
         echo"<a href='".route('danhsach',$danhmucchon->alias).".html' title='".$danhmucchon->ten_danhmuc."'><div>".$danhmucchon->ten_danhmuc."</div></a>";
 
           }

       }

}
// danh sách thể loại frontend với $dong thì cứ 3 li 1 dòng, $dem đếm xem danh mục con cha của danh mục cha có số menu con, ko có cho vào 1 mục khác 
function theloai_parent($theloai,$visit,$size=0,$tenkhac= array(),$idkhac=array(),$dem=0,$soparent=0,$maxcon=0,$dong=0){
foreach($theloai as $getheloai)
{
   $parent=DB::table('mptheloais')->where('parent_id',$getheloai->id_danhmuc)->orderBy('thutu', 'asc')->get()->toArray();
   
 if(count($parent)>0) // khi có con
{

      if($visit==0)
      {
         // kiểm tra xem danh mục con đầu có con ko để gán thành 1 dãy menu còn các danh mục con ko có con thì sẽ gán hết vào 1 dãy menu
             $check=0;
             $menukocon=0;
               foreach ($parent as $getparent) {
               $checkpar=DB::table('mptheloais')->where('parent_id',$getparent->id_danhmuc)->orderBy('thutu', 'asc')->get()->toArray();
                if(count($checkpar)>0)
                {
                  $check++;
                }
                else{
                 $menukocon=1;
                }
               }
               if($menukocon==1)
               {
                  $check++;
               }
           
         // các lớp css khi có 1 dãy menu con khi có 2 dãy menu con, 3 dãy trở lên còn lại
                 $lop="";

        if($check==1)
        {
           $lop="colmenu1";
        }
        elseif($check==2)
        {
          $lop="colmenu2";

        }
        else{
           $lop="";
        }
        // end các lớp css
         $tenkhac=array();
         $idkhac=array();
         $dem=0;
         $maxcon=0;
         $soparent=count($parent);
         echo"<li class='has-children ' >
                <a >".$getheloai->ten_danhmuc."
                </a>
                <ul class='".$lop." cd-secondary-dropdown is-hidden' >
                  <li class='go-back'><a >Quay lại</a></li>
                  <li class='see-all'>
                     <a  href='".route('danhsach',$getheloai->alias).".html'>Tất cả ".$getheloai->ten_danhmuc."
                     </a>
                  </li>";
                   theloai_parent($parent,1,13,$tenkhac,$idkhac,$dem,$soparent,$maxcon);

         echo"  </ul>
               </li>";
        
      }
      elseif($visit==2) // menu đa cấp con
      {
        echo " <li class='has-children' >
                  <a  title='".$getheloai->ten_danhmuc."' style='font-size: ".$size."px;'' >".$getheloai->ten_danhmuc."</a>
                     <ul class='is-hidden'>
                        <li class='go-back'><a >Quay lại</a></li>
                        <li class='see-all' ><a  title='Tất cả ".$getheloai->ten_danhmuc."'  href='".route('danhsach',$getheloai->alias).".html' style='font-size: ".$size."px'>Tất cả ".$getheloai->ten_danhmuc."</a></li>";
                   theloai_parent($parent,2,13,$tenkhac,$idkhac,$dem,$soparent);


        echo"        </ul>
              </li>";
      
    
      }
      else // menu con cha
      {
               if($maxcon<count($parent))
               {
                  $maxcon=count($parent);
               }

                  $soparent=$soparent-1;

                  $dong++;

           echo " <li class='has-children' >
                  <a  title='".$getheloai->ten_danhmuc."' style='font-size: ".$size."px;'' href='#' >".$getheloai->ten_danhmuc."</a>
                     <ul class='is-hidden'>
                        <li class='go-back'><a >Quay lại</a></li>
                        <li class='see-all' ><a title='Tất cả ".$getheloai->ten_danhmuc."'  href='".route('danhsach',$getheloai->alias).".html'  style='font-size: ".$size."px'>Tất cả ".$getheloai->ten_danhmuc."</a></li>
                       ";
                   theloai_parent($parent,2,13,$tenkhac,$idkhac,$dem,$soparent,$maxcon,$dong);

               if($dong==3)
               {  
                  // kiểm xem giá trị biến con của các menu con cha để đẩy số li thêm giúp giao diện đẹp hơn
                  if(count($parent)<$maxcon)
                  {
                   for ($i=1; $i <=($maxcon-count($parent)) ; $i++) { 
                   echo"<li><a ></a></li>";  
                   }
                  }
                  $dong=0;
                  $maxcon=0;
               }
        echo"        
               

           </ul>
              </li>";
      }




}

  else // khi ko có con
  {  
      if($visit==0) //0 danh mục cha 1 danh mục con
      {
            echo"<li><a href='".route('danhsach',$getheloai->alias).".html' >".$getheloai->ten_danhmuc."</a></li>";
         
      }
      elseif($visit==2) // menu đa cấp con
      {

         echo"<li><a href='".route('danhsach',$getheloai->alias).".html' style='font-size: ".$size."px'>".$getheloai->ten_danhmuc."</a></li>";
      }
      else // menu con cha
      {
               $tenkhac[]=$getheloai->ten_danhmuc;
               $idkhac[]=$getheloai->alias;
               $dem++;

                if($dem==$soparent)
               {
               echo "<li class='has-children' >
                  <a style='font-size: ".$size."px;'' >Khác</a>
                     <ul class='is-hidden'>
                        <li class='go-back'><a >Quay lại</a></li>
                        ";
                     # code...
                
             for ($i=0; $i < count($tenkhac); $i++) { 
          echo"<li><a href='".route('danhsach',$getheloai->alias).".html' style='font-size: ".$size."px'>".$tenkhac[$i]."</a></li>";

              }
                 
               echo"</ul>
              </li>";
               }
      }
      
  }



}

}
?>﻿