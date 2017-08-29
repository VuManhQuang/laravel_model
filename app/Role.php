<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    //
     protected $table='roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','name', 'dislay_name', 'description'
    ];
    public $timestamps=false;

   
}
