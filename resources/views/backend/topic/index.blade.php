@extends('backend.layouts.master')
@section('title', 'Chủ đề')
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
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chủ đề</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header navbar-light">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form method="GET" action="{{ route('admin.topic.index') }}"
                                            class="form-inline ml-3">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control form-control-navbar" type="search" name="search"
                                                    value="{{ old('search') }}" placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-navbar" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#topic-modal">
                                            <i class="fa fa-plus"></i>
                                            Thêm mới
                                        </button>
                                        <!-- Button trigger modal -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-bordered table-hover dataTable dtr-inline table-post-blog">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">STT</th>
                                                        <th width="15%">Ảnh</th>
                                                        <th width="40%">Tên chủ đề</th>
                                                        <th width="15%" class="text-center">Ngày tạo</th>
                                                        <th width="15%" class="text-center">Trạng thái</th>
                                                        <th width="10%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($topics as $key => $topic)
                                                        <tr>
                                                            <td><span>{{ $key + 1 }}</span></td>
                                                            <td>
                                                                <span class="thumbnail-post">
                                                                    @if ($topic->thumbnail)
                                                                        <img src="{{ asset($topic->thumbnail) }}"
                                                                            width="50%" alt="Image">
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    {{ $topic->name }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span>{{ date('d-m-Y', strtotime($topic->created_at)) }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge bg-success">
                                                                    {{ \App\Models\Topic::STATUS[$topic->status] }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <button onclick="getTopicDetail({{ $topic->id }})"
                                                                    type="button" class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#update-topic-modal">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn  btn-danger btn-sm"
                                                                    data-toggle="modal" data-target="#delete-topic-modal"
                                                                    onclick="openDeleteModal({{ $topic->id }}, `{{ $topic->name }}`)">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $topics->appends($_GET)->links('backend.partials.paginate') }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
    <!-- Modal create topic -->
    @include('backend.topic.create')
    <!-- Modal create topic -->

    <!-- Modal edit topic -->
    @include('backend.topic.edit')
    <!-- Modal edit topic -->

    <!-- Modal confirm delete topic -->
    <div class="modal fade" id="delete-topic-modal" tabindex="-1" role="dialog" aria-labelledby="delete-topic-label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-topic-label">
                        Xóa chủ đề
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete-id" name="id">
                    Bạn có chắc chắn muốn xóa chủ đề <span id="modal-delete-name"></span> không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit" class="btn btn-primary" id="button-submit-delete">
                        Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal confirm delete topic -->

    <!-- Alert-->
    <div id="toast-msg" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000"
        style="position: absolute; top: 1rem; right: 0rem; z-index: 9999">
        <div class="d-flex justify-content-center align-items-center toast-body">
            <div id="alert-msg-err" class="mr-2"></div>
            <button type="button" class="close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <!-- Alert -->
@endsection
@section('addJs')
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admins/common/js/topic.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
@endsection
