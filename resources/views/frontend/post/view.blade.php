 @extends('layouts.app')

 @section('title', "$post->meta_title")
 @section('meta_decription', "$post->meta_description")
 @section('meta_keyword', "$post->meta_keyword")

 @section('content')
     <div class="py-4">
         <div class="container">
             <div class="row">
                 <div class="col-md-4">
                     <div class="mb-3">
                         <div class="category-heading card-header">
                             <h4 class="mb-0 text-white">
                                 {!! $post->name !!}
                             </h4>
                         </div>
                         <div class="mt-3">
                             <h5>
                                 {{ $post->category->name . '/' . $post->name }}
                             </h5>
                             <h5>
                                 Posted By:
                                 <a class="ml-2" href="{{ url('posts/' . $post->user->id) }}">{{ $post->user->name }}</a>
                             </h5>
                             <div>
                                 <h5>
                                     Unique Views: {{ $unique_views }}
                                 </h5>
                             </div>
                             <div>
                                 <h5>
                                     All Views: {{ $all_views }}
                                 </h5>
                             </div>
                         </div>
                     </div>
                     <div class="card ">
                         <div class="card-header">
                             <h4 class="text-white">
                                 Latest Posts
                             </h4>
                         </div>
                         <div class="card-body">
                             @foreach ($latest_posts as $latest_post_item)
                                 <a href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                     class="text-decoration-none">
                                     <h6>
                                         {{ $latest_post_item->name }}
                                     </h6>
                                 </a>
                             @endforeach
                         </div>
                     </div>

                 </div>
                 <div class="col-md-8">
                     <div class="">
                         <div class="card-body post-description">

                             <h3> {!! $post->description !!}
                             </h3>
                         </div>
                     </div>
                     <div class="comment-area mt-4">
                         @if (session('message'))
                             <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                         @else
                         @endif
                         <div class="card card-body">
                             <h6 class="card-title">Leave a comment</h6>
                             <form action="{{ url('comments') }}" method="POST">
                                 @csrf
                                 <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                 <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                 <button type="submit" class="btn btn-primary mt-3">
                                     Add Comment
                                 </button>
                             </form>
                         </div>
                         @forelse ($post->comments as $comment)
                             <div class="card card-body shadow-sm mt-3">
                                 <div class="detail-area">
                                     <h6 class="user-name mb-1">
                                         @if ($comment->user)
                                             {{ $comment->user->name }}
                                         @endif
                                         <small class="ms-3 text-primary">
                                             Commented on: {{ $comment->created_at->format('d-m-Y') }}
                                         </small>
                                     </h6>
                                     <p class="user-comment mb-1">
                                         {!! $comment->comment_body !!}
                                     </p>
                                 </div>
                                 @if (Auth::check() && Auth::id() == $comment->user_id)
                                     <div>
                                         <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                         <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
                                     </div>
                                 @endif

                                 @forelse ($comment->replies as $reply)
                                     <div class="card card-body shadow-sm mt-3">
                                         <div class="detail-area">
                                             <h6 class="user-name mb-1">
                                                 @if ($reply->user)
                                                     {{ $reply->user->name }}
                                                 @endif
                                                 <small class="ms-3 text-primary">
                                                     Replied on: {{ $reply->created_at->format('d-m-Y') }}
                                                 </small>
                                             </h6>
                                             <p class="user-comment mb-1">
                                                 {!! $reply->reply_body !!}
                                             </p>
                                         </div>
                                         @if (Auth::check() && Auth::id() == $reply->user_id)
                                             <div>
                                                 <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                                 <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
                                             </div>
                                         @endif


                                     </div>
                                 @empty
                                 @endforelse




                                 <div class="mt-3 ">
                                     <h6 class="card-title">Reply</h6>
                                     <form action="{{ url('replies') }}" method="POST">
                                         @csrf
                                         <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                         <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                         <textarea name="reply_body" class="form-control" rows="3" required></textarea>
                                         <button type="submit" class="btn btn-warning mt-3">
                                             Add Reply
                                         </button>
                                     </form>
                                 </div>

                             </div>
                         @empty
                             <div class="card card-body shadow-sm mt-3">
                                 <h6>
                                     No Comments Available.
                                 </h6>
                             </div>
                         @endforelse
                     </div>
                 </div>


             </div>
         </div>
     </div>
 @endsection
