<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpquangcaosanpham extends Model
{
    //
    protected $table='mpquangcaosanphams';
    protected $primaryKey = 'id';
    protected $fillable=['id','anh_quangcao','hienthi','thutu','link'];
    public $timestamps=false;
}
