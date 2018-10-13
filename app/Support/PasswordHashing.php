<?php

namespace App\Support;


trait PasswordHashing {
     /**
     * Set password in database
     * 
     * @return void
     */

    public function setPasswordAttribute()
    {
        if (is_null(app('request')->input('password'))) {
            unset($this->attributes['password']);
            return;
        }
       $this->attributes['password'] = bcrypt(app('request')->input('password'));
    }
}