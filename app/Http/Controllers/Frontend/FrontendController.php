<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $all_categories = Category::where('status', '0')->get();
        $latest_posts = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(15);
        return view('frontend.index', compact('all_categories', 'latest_posts'));
    }
    public function viewCategoryPost($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('status', '0')->paginate(5);
            return view('frontend.post.index', compact('post', 'category'));
        } else {
            return redirect('/');
        }
    }

    public function viewPost(Request $request, string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $ip = $request->ip();
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
            $latest_posts = Post::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(5);
            $all_views = Visitors::where('post_id', $post->id)->count();
            $unique_views = Visitors::where('post_id', $post->id)->distinct('ip')->count('ip');
            if (Auth::check()) {
                Visitors::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'ip' => $ip,
                ]);
            }

            return view('frontend.post.view', compact('post',  'latest_posts', 'all_views', 'unique_views'));
        } else {
            return redirect('/');
        }
    }

    public function usersPostsList($user_id)
    {
        $all_categories = Category::where('status', '0')->get();
        $comment = Comment::where('user_id', $user_id)->get();
        $user = User::find($user_id);
        $latest_posts = Post::where('status', '0')
        ->where('created_by', $user_id)
            ->orderBy('created_at', 'DESC')
            ->take(15)
            ->get();
        return view('frontend.usersPosts.index', compact('all_categories', 'latest_posts', 'user', 'comment'));
    }
}
