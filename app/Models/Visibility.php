<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];
}
