<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpprodcut extends Model
{
    //
     protected $table='mpprodcuts';
    protected $primaryKey = 'id_sanpham';
    protected $fillable=['id_sanpham','ten_sanpham','alias','discount','anh_sanpham_to','gia','cach_sudung','noidung_thucvat','noidung_hieuqua','noidung_sanpham','view','the_tich','tieude_hieuqua','tieude_thucvat','ton_kho_sp','rate_total','rate_count','id_danhmuc'];
    public $timestamps=false;
    public function theloai(){
    	return$this->belongTo('App\Mptheloai');
    }
}
