<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpdathang extends Model
{
    //
          protected $table='mpdathangs';
    protected $primaryKey = 'id_order';
    protected $fillable=['id_order','data','qty','amount','ten_sanpham','id_sanpham','id_giaodich'];
    public $timestamps=false;
       public function giaodich(){
    	return$this->belongTo('App\Mpgiaodich');
    }
}
