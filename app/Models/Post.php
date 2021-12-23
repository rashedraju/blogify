<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model {
    use HasFactory;

    protected $with = ['category', 'author'];

    public static function findOrFail( $id ) {
        $post = Post::find( $id );

        if ( !$post ) {
            throw new ModelNotFoundException();
        }

        return $post;
    }

    public function scopeFilter( $query, array $filters ) {

        $query->when( $filters['status'] ?? false, fn( Builder $query, $status ) => $query->whereHas( 'status', fn( $query ) => $query->where( 'slug', $status ) ) );

        $query->when( $filters['search'] ?? false, fn( $query, $search ) => $query->whereHas( fn( $query ) => $query
                ->where( 'title', 'like', '%' . $search . '%' )
                ->orWhere( 'body', 'like', '%' . $search . '%' )
        )
        );

        $query->when( $filters['categories'] ?? false, fn( $query, $category ) => $query
                ->whereHas( 'category', fn( $query ) => $query
                        ->where( 'slug', $category )
                )
        );

        $query->when( $filters['author'] ?? false, fn( $query, $author ) => $query
                ->whereHas( 'author', fn( $query ) => $query
                        ->where( 'username', $author )
                )
        );
    }

    public function category(): BelongsTo {
        return $this->belongsTo( Category::class );
    }

    public function author(): BelongsTo {
        return $this->belongsTo( User::class, 'user_id' );
    }

    public function comments() {
        return $this->hasMany( Comment::class );
    }

    public function status() {
        return $this->belongsTo( Status::class );
    }
}
