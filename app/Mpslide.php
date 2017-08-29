<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpslide extends Model
{
        //
    protected $table='mpslides';
    protected $primaryKey = 'id_slide';
    protected $fillable=['id_slide','ten_slide','anh','link','thutu_slide'];
    public $timestamps=false;

}
