<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpkhuyenmai extends Model
{
    //
         protected $table='mpkhuyenmais';
    protected $primaryKey = 'id_khuyenmai';
    protected $fillable=['id_khuyenmai','sukien','thoigian_batdau','thoigian_ketthuc','anh_khuyenmai','ghichu_khuyenmai','noi_dung_km'];
    public $timestamps=false;
}
