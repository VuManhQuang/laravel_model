<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpmenu extends Model
{
    //
     protected $table='mpmenus';
    protected $primaryKey = 'id_menu';
    protected $fillable=['id_menu','ten_menu','goiy_menu','url','parent_id','thutu'];
    public $timestamps=false;
}
