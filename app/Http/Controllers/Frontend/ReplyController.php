<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\MailNotification;
use App\Mail\ReplyMailNotification;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'reply_body' => 'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('message', 'Reply area is mandatory');
            }
            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            $comment = Comment::where('id', $request->comment_id)->first();
            $commentUser = Comment::with('user')->where('id', $request->comment_id)->first();


            if ($post) {
                Reply::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_id' => $comment->id,
                    'reply_body' => $request->reply_body,
                ]);
                Mail::to($commentUser->user->email)->send(new ReplyMailNotification($request->reply_body));

                return redirect()->back()->with('message', 'Replied Successfully');
            } else {
                return redirect()->back()->with('message', 'No Such Comment Found');
            }
        } else {
            return redirect('login')->with('message', 'Login first to reply');
        }
    }
}
