<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function authors(){
        return User::where('is_admin', '1')->get();
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function getNameAttribute($name): string
    {
        return ucwords($name);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
