<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mptheloai extends Model
{
    //
    protected $table='mptheloais';
    protected $primaryKey = 'id_danhmuc';
    protected $fillable=['id_danhmuc','ten_danhmuc','alias','noidung_danhmuc','banner_anhdai','parent_id','thutu'];
    public $timestamps=false;

    public function product(){
    	return$this->hasMany('App\Mpprodcut');
    }
}
