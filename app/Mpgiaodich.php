<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpgiaodich extends Model
{
    //
    protected $table='mpgiaodiches';
    protected $primaryKey = 'id_giaodich';
    protected $fillable=['id_giaodich','amount','message','payment','status','user_email','user_name','user_phone','id_thanhvien','id_quatang'];
    public $timestamps=true;
     public function order(){
    	return$this->hasMany('App\Mpdathang');
    }
}
