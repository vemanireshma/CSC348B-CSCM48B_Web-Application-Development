@extends('layouts.masteruser')
@section('title', 'Edit Post')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div class="card-header">
                <h4>Edit Posts
                    <a href="{{ url('user/posts') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('user/update-post/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" required class="form-control">
                            <option value=""> -- Select Category -- </option>
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}"
                                    {{ $post->category_id == $cateitem->id ? 'selected' : '' }}>
                                    {{ $cateitem->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Post Name</label>
                        <input type="text" name="name" value="{{ $post->name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea rows="5" name="description" id="mySummernote" class="form-control">{{ $post->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Youtube Iframe Link</label>
                        <input type="text" name="yt_iframe" class="form-control" value="{{ $post->yt_iframe }}"
                            rows="4">
                    </div>
                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea rows="3" name="meta_description" class="form-control">{{ $post->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea rows="3" name="meta_keyword" class="form-control">{{ $post->meta_keyword }}</textarea>
                    </div>

                    <h6>Status</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <input type="checkbox" value="{{ $post->status == '1' ? 'checked' : '' }}" name="status">
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
