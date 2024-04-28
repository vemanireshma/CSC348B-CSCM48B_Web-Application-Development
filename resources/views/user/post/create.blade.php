@extends('layouts.masteruser')
@section('title', 'Add Post')

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
                <h4>Add Posts
                    <a href="{{ url('user/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('user/add-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($category as $cateitem)
                                @if (Auth::check() && Auth::id() == $cateitem->created_by)
                                    <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea rows="5" name="description" id="mySummernote" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Youtube Iframe Link</label>
                        <textarea type="file" name="yt_iframe" class="form-control" rows="4"></textarea>
                    </div>
                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea rows="3" name="meta_description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea rows="3" name="meta_keyword" class="form-control"></textarea>
                    </div>

                    <h6>Status</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="navbar_status">
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save Category</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
