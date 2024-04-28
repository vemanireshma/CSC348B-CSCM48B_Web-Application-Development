<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::where('created_by', Auth::id())->count();
        $posts = Post::where('created_by', Auth::id())->count();
        $users = User::where('role_as', 0)->count();
        $admins = User::where('role_as', 1)->count();

        return view('user.dashboard', compact('categories', 'posts', 'users', 'admins'));
    }
}
