<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','type','verified','active','access_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $dates = [
        'created_at', 'updated_at'
    ];

    public function type()
    {
        return $this->belongsTo(App\UserType::class);
    }

    public function generateAccessCode()
    {
        return str_random(30);
    }
}
