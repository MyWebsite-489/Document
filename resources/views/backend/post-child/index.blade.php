@extends('backend.layouts.master')
@section('title', 'Bài viết')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Bài viết</h1>
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
                                        <form method="GET" action="{{ route('admin.post-child.index') }}"
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
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.post-child.create') }}">
                                            <i class="fa fa-plus"></i>
                                            Thêm mới
                                        </a>
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
                                                        <th width="5%" class="text-center">ID</th>
                                                        <th width="15%">Chủ đề</th>
                                                        <th width="15%">Chủ đề cha</th>
                                                        <th width="10%" class="text-center">Ngày tạo</th>
                                                        <th width="10%" class="text-center">Trạng thái</th>
                                                        <th width="10%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($posts as $key => $post)
                                                        <tr>
                                                            <td>
                                                                <span>{{ $post->id }}</span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <a href="{{ route('admin.post-child.edit', ['id' => $post->id]) }}"
                                                                        class="post-name">
                                                                        {{ $post->name }}
                                                                    </a>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="d-flex category-name">
                                                                    {{  $post->topic }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span>{{ date('d-m-Y', strtotime($post->created_at)) }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge bg-success">
                                                                    {{ \App\Models\PostChildDocument::STATUS[$post->status] }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.post-child.edit', ['id' => $post->id]) }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <button type="button" class="btn  btn-danger btn-sm"
                                                                    data-toggle="modal" data-target="#delete-post-modal"
                                                                    onclick="openDeleteModal({{ $post->id }}, `{{ $post->name }}`)">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{ $posts->appends($_GET)->links('backend.partials.paginate') }}
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

    <!-- Modal confirm delete post -->
    <div class="modal fade" id="delete-post-modal" tabindex="-1" role="dialog" aria-labelledby="delete-post-label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-post-label">
                        Xóa bài viết
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete-id" name="id">
                    Bạn có chắc chắn muốn xóa bài viết <span id="modal-delete-name"></span> không?
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
    <!-- Modal confirm delete post -->

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
    <script src="{{ asset('admins/common/js/post-child.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
@endsection
