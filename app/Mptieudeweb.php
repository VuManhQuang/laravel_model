<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mptieudeweb extends Model
{
    //
    protected $table='mptieudewebs';
    protected $primaryKey = 'id_tieude';
    protected $fillable=['id_tieude','ten_tieude','key','noidung_tieude'];
    public $timestamps=false;
}
