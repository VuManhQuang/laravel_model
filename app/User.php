<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
           use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $table='users';
    protected $primaryKey = 'id_thanhvien';
    public $timestamps=false;
   
    protected $fillable = [
        'id_thanhvien', 'facebook_id' , 'username', 'password','name','email','phone_user','diachi_user','kieu'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function product(){
        return$this->hasMany('App\Product');
    }
}
