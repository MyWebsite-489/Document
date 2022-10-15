@extends('backend.layouts.master')
@section('title', 'Bài viết')
@section('addCss')
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}">
    <style>
        .text-muted {
            color: red !important;
        }

    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 p-2 widget meta-boxes">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chỉnh sửa bài viết</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.post-child.update', ['id' => $post->id]) }}" class=""
                    method="POST" id="editPost" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên bài viết<code>*</code></label>
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            value="{{ $post->name }}" required>
                                        @error('name')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả<code>*</code></label>
                                        <textarea class="form-control" rows="3" placeholder="Mô tả" name="description"
                                            required>{{ $post->description }}</textarea>
                                        @error('description')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung bài viết<code>*</code></label>
                                        <textarea class="content-post" placeholder="Nội dung bài viết" name="content"
                                            required>{{ $post->content }}</textarea>
                                        @error('content')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 right-sidebar">
                            <div class="">
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label>Trạng thái<code>*</code></label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group">
                                            <select class="form-control" id="status" name="status">
                                                @foreach (\App\Models\PostChildDocument::STATUS as $key => $status)
                                                    <option value="{{ $key }}"
                                                        {{ $post->status == $key ? 'selected' : '' }}>{{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label>Chủ đề<code>*</code></label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group">
                                            <select class="form-control" id="topic_document_id" name="topic_document_id" required>
                                                @foreach ($topics as $key => $topic)
                                                    <option value="{{ $topic->id }}"
                                                        {{ $post->topic_document_id == $topic->id ? 'selected' : '' }}>
                                                        {{ $topic->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('topic_document_id')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-body">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fa fa-floppy-o mr-1"></i>Lưu</button>
                                        <a class="btn btn-secondary ml-2" href="{{ route('admin.post-child.index') }}">
                                            Hủy
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('addJs')
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admins/common/js/editPost.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        $(function() {
            // Summernote
            $('.content-post').summernote({
                height: 700,
            });
        })
    </script>
@endsection
