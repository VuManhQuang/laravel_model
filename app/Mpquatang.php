<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpquatang extends Model
{
    //
         protected $table='mpquatangs';
    protected $primaryKey = 'id_quatang';
    protected $fillable=['id_quatang','capdo','quatang','tong_giatri','ma_quatang','tonkho'];
    public $timestamps=false;
}
