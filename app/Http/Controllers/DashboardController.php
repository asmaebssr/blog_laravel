<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public static function middleware() : array
    // {
    //     return [
    //         'auth'
    //     ];
    // }

    public function index() {

        // $posts = Post::where('user_id', Auth::id())->get();
        // dd($posts);

        $posts = Auth::user()->posts()->latest()->paginate(3);

        return view('users.dashboard', ['posts' => $posts]);
    }

    function userPosts(User $user) {

        $userPosts = $user->posts()->latest()->paginate(6);
        return view('users.posts', [
            'posts' => $userPosts,
            'user' => $user
        ]);
    }
}
