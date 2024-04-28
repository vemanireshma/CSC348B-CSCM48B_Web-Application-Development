@extends('layouts.app')
@section('title', 'Blog Post')
@section('meta_decription', 'Blog Post')
@section('meta_keyword', 'Blog Post')
@section('content')



    <div class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <h4>
                    Author Name : {{ $user->name }}
                </h4>
                <h4 class="mt-2">
                    Author Email : {{ $user->email }}
                </h4>
                <div class="col-md-12 mt-4">
                    <h4>
                        Posts
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    @foreach ($latest_posts as $latest_post_item)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                class="text-decoration-none">
                                <h5 class="text-dark mb-0">
                                    {{ $latest_post_item->name }}
                                </h5>
                            </a>
                            <h6 class="mt-2">
                                Posted On: {{ $latest_post_item->created_at->format('d-m-Y') }}
                            </h6>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12 mt-4">
                    <h4>
                        Comments
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    @foreach ($comment as $comment_item)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href=""
                                class="text-decoration-none">
                                <h5 class="text-dark mb-0">
                                    {{ $comment_item->comment_body }}
                                </h5>
                            </a>
                            <h6 class="mt-2">
                                Posted On: {{ $comment_item->created_at->format('d-m-Y') }}
                            </h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
