<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mphotro extends Model
{
    //
     protected $table='mphotros';
    protected $primaryKey = 'id_lienhe';
    protected $fillable=['id_lienhe','email_lienhe','ten_lienhe','skype','phonelienhe','diachi_lienhe'];
    public $timestamps=false;
}
