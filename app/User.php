<?php

namespace App;

use App\OrdersModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function is_admin(){
        if($this->admin){
            dd($this->admin);
            return true;
        }
        else{
            false;
        }
    }
    public function orders()
    {
        return $this->hasMany(OrdersModel::class,'user_id','id');//foreign key user_id local key 'id'
    }
}
