<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    public static function boot() {
        parent::boot();

        static::created( function ( $user ) {
            $user->visibilities()->create( ['user_id' => $user->id] );
        } );
    }

    public static function authors() {
        return User::where( 'is_admin', '1' )->get();
    }

    public function setPasswordAttribute( $password ) {
        $this->attributes['password'] = bcrypt( $password );
    }

    public function getNameAttribute( $name ): string {
        return ucwords( $name );
    }

    public function getImageAttribute( $name ) {
        return Storage::exists( $name ) ? asset( '/storage/' . $name ) : asset( 'images/user.png' );
    }

    public function posts(): HasMany {
        return $this->hasMany( Post::class );
    }

    public function followers() {
        return $this->belongsToMany( User::class, 'following', 'followed_user_id', 'follower_user_id' );
    }

    public function followings() {
        return $this->belongsToMany( User::class, 'following', 'follower_user_id', 'followed_user_id' );
    }

    public function visibilities() {
        return $this->hasOne( Visibility::class, 'user_id' );
    }

    public function bookmarks() {
        return $this->hasMany( Bookmark::class );
    }
}
