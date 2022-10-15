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
                        <h1 class="m-0 text-dark">Thêm mới bài viết</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.post.store') }}" method="POST" id="createPost"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên bài viết<code>*</code></label>
                                        <input type="text" class="form-control" placeholder="Tên bài viết" name="name"
                                            required value="{{ old('name') }}">
                                        @error('name')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả<code>*</code></label>
                                        <textarea class="form-control" rows="3" placeholder="Mô tả"
                                            name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung bài viết<code>*</code></label>
                                        <textarea class="content-post" placeholder="Nội dung bài viết" name="content"
                                            required>{{ old('content') }}</textarea>
                                        @error('content')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 right-sidebar">
                            <div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label>Trạng thái<code>*</code></label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group">
                                            <select class="form-control" id="status" name="status" required>
                                                @foreach (\App\Models\Post::STATUS as $key => $status)
                                                    <option value="{{ $key }}"
                                                        {{ old('status') == $key ? 'selected' : '' }}>
                                                        {{ $status }}
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
                                        <div class="form-group form-group-no-margin ">
                                            <div class="multi-choices-widget list-item-checkbox mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar"
                                                style="position: relative; overflow: visible; padding: 0px;">
                                                <div id="mCSB_1"
                                                    class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside"
                                                    style="max-height: 320px;" tabindex="0">
                                                    <div id="mCSB_1_container"
                                                        class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y mCS_x_hidden mCS_no_scrollbar_x"
                                                        style="position: relative; top: 0px; left: 0px; width: 354.5px;"
                                                        dir="ltr">
                                                        <ul>
                                                            @foreach ($topics as $key => $topic)
                                                                <li value="{{ $topic->id }}">
                                                                    <label>
                                                                        <input type="checkbox" value="{{ $topic->id }}"
                                                                            name="topics[]">
                                                                        {{ $topic->name }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label>Thumbnail<code>*</code></label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="image-box">
                                            <div class="preview-image-wrapper ">
                                                <img src="{{ asset('assets/images/placeholder.png') }}"
                                                    alt="Preview image" class="preview_image" width="150">
                                                <a class="btn_remove_image" title="Remove image">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                            <div class="image-box-actions">
                                                <input type="file" accept=".png,.jpg,.jpeg,.gif" name="thumbnail"
                                                    class="btn_gallery d-none" required>
                                                @error('thumbnail')
                                                    <small class="form-text text-muted">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="tag" class="control-label">Tags</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Write some tags" name="tag"
                                                type="text" value="{{ old('tag') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-body">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fa fa-floppy-o mr-1"></i>Lưu</button>
                                        <a class="btn btn-secondary ml-2" href="{{ route('admin.post.posts') }}">
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
    <script src="{{ asset('admins/common/js/createPost.js') }}"></script>
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
