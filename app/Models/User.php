<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Support\PasswordHashing;

class User extends Authenticatable 
{
    use Notifiable, PasswordHashing;

    /**
     * The attribute table name
     *
     * @var string
     */
    protected $table = "users";

    /**
     * The primary key Table
     *
     * @var array
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','phone', 'fullname', 'address', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    protected $hidden = [
        'password', 'remember_token',
    ];

}
