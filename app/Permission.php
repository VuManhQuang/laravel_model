<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //
         protected $table='permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','name', 'dislay_name', 'description'
    ];
    public $timestamps=false;

}
