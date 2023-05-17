<?php

namespace App\Models;

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
        'name', 'username', 'email', 'password',
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

    //eloqouent mutator, this will run when we set the password
    //ANY TIME THE PASSWORD IS SET IT WILL RUN TTHROUGH THIS FUNCTION AUTOMATICALLY WITHOUGHT CALLING IT
    public function setPasswordAttribute($password){
        //whatever i set in this function is what will be saved to the database
        $this->attributes['password'] = bcrypt($password);
    }

    //eleqouent relationship, user can have many posts
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
