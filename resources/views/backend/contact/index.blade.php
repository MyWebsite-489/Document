@extends('backend.layouts.master')
@section('title', 'Khách hàng liên hệ')
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
                        <h1 class="m-0 text-dark">Khách hàng liên hệ</h1>
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
                                <form method="GET" action="{{ route('admin.contact.index') }}" class="form-inline">
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
                                                        <th width="15%">Họ và tên</th>
                                                        <th width="15%">SĐT</th>
                                                        <th width="15%">Email</th>
                                                        <th width="25%">Nội dung</th>
                                                        <th width="15%" class="text-center">Trạng thái</th>
                                                        <th width="10%" class="text-center">Ngày gửi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contacts as $key => $contact)
                                                        <tr>
                                                            <td>
                                                                <span>{{ $key + 1 }}</span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    {{ $contact->fullname }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    {{ $contact->phone }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    {{ $contact->email }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    {{ $contact->content }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge bg-success">
                                                                    {{ \App\Models\Contact::STATUS[$contact->status] }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span>
                                                                    {{ date('d-m-Y', strtotime($contact->created_at)) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $contacts->appends($_GET)->links('backend.partials.paginate') }}
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
@endsection
@section('addJs')
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
@endsection
