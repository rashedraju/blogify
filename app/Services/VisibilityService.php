<?php

namespace App\Services;

use App\Models\User;
use App\Models\Visibility;

class VisibilityService{
    public function create(User $user){
        Visibility::create(['user_id' => $user->id]);
    }
}
