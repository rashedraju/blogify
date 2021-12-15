<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookmark;
use Illuminate\Validation\Rule;
use App\Services\VisibilityService;

class BookmarksController extends Controller
{
    protected $visibilityService;

    public function __construct(VisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function index(User $user){
        return view('profile.bookmarks', [
            'username' => $user->username,
            'bookmarks' => $user->bookmarks,
            'visibility' => $this->visibilityService->checkVisibility($user, 'bookmarks')
        ]);
    }

    public function create(User $user){
        $attrs = request()->validate([
            'post_id' => ['required', Rule::exists('posts', 'id')]
        ]);

        $user->bookmarks()->create($attrs);

        return back();
    }

    public function destory(User $user, Bookmark $bookmark){
        $user->bookmarks()->delete($bookmark);

        return back();
    }
}
