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
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public static function create($username, $password)
    {
        $user = new self;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }

    public static function exists($username) {
        $user = self::where('username', $username)->first();
        return $user;
    }

    public function advert()
    {
        return $this->hasMany(Advert::class, 'author_name', 'username');
    }
}
