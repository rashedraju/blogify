<?php

namespace App\Http\Controllers;

use App\Models\User;

class NotificationsController extends Controller {
    public function destory( User $user ) {
        $user->notifications()->delete();

        return back();
    }
}
