<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'username', 'user_role_id', 'doctor_type_id', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', '_token', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class,'user_role_id');
       // return $this->hasOne(UserRole::class,'user_role_id','id');
    }

    public function doctor_type() {
        return $this->belongsTo('App\DoctorType');
    }

    public function IsDoctor(){
        return $this->user_role_id === 2;
    }

    public function IsAdmin(){
        return $this->user_role_id === 1;
    }
}
