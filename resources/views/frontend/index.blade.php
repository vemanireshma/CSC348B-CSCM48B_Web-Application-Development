@extends('layouts.app')
@section('title', 'Blog Post')
@section('meta_description', 'Blog Post')
@section('meta_keyword', 'Blog Post')

@section('content')

    <div class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-3">All Blog Posts Reading List</h4>
                    <div class="underline mb-4"></div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($latest_posts as $latest_post_item)
                        <div class="col">
                            <div class="card bg-gray shadow-sm mb-3 h-100">
                                <div class="card-body">
                                    <div>
                                        <a href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                            class="text-decoration-none">
                                            <h5 class="text-primary">{{ $latest_post_item->name }}</h5>
                                            <h6 class="text-muted">Blog Category: {{ $latest_post_item->category->slug }}
                                            </h6>
                                            <h6 class="text-muted">Description: {{ $latest_post_item->slug }}</h6>
                                        </a>
                                        <div>
                                            <h6 class="text-muted">Posted On:
                                                {{ $latest_post_item->created_at->format('d-m-Y') }}
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
