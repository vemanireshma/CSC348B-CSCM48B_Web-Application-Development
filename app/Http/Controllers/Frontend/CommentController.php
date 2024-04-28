<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CommentMailNotification;
use App\Mail\MailNotification;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('message', 'Comment area is mandatory');
            }
            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            $postCreator = User::find($post->created_by);

            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body,
                ]);
                Mail::to($postCreator->email)->send(new CommentMailNotification($request->comment_body));
                return redirect()->back()->with('message', 'Commented Successfully');
            } else {
                return redirect()->back()->with('message', 'No Such Post Found');
            }
        } else {
            return redirect('login')->with('message', 'Login first to comment');
        }
    }
}
