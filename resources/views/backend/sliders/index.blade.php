@extends('backend.layouts.master')
@section('title', 'Sliders')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sliders</h1>
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
                                        <form method="GET" action="{{ route('admin.sliders.index') }}"
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
                                            data-target="#slider-modal">
                                            <i class="fa fa-plus"></i>
                                            Th??m m???i
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
                                                        <th width="15%">???nh</th>
                                                        <th width="40%">T??n ch??? ?????</th>
                                                        <th width="15%" class="text-center">Ng??y t???o</th>
                                                        <th width="15%" class="text-center">Tr???ng th??i</th>
                                                        <th width="10%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sliders as $key => $slider)
                                                        <tr>
                                                            <td><span>{{ $key + 1 }}</span></td>
                                                            <td>
                                                                <span class="thumbnail-post">
                                                                    @if ($slider->thumbnail)
                                                                        <img src="{{ asset($slider->thumbnail) }}"
                                                                            width="50%" alt="Image">
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    {{ $slider->name }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span>{{ date('d-m-Y', strtotime($slider->created_at)) }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge bg-success">
                                                                    {{ \App\Models\slider::STATUS[$slider->status] }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <button onclick="getSliderDetail({{ $slider->id }})"
                                                                    type="button" class="btn btn-primary btn-sm"
                                                                    data-toggle="modal" data-target="#update-slider-modal">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn  btn-danger btn-sm"
                                                                    data-toggle="modal" data-target="#delete-slider-modal"
                                                                    onclick="openDeleteModal({{ $slider->id }}, `{{ $slider->name }}`)">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $sliders->appends($_GET)->links('backend.partials.paginate') }}
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

    <!-- Modal create slider -->
    @include('backend.sliders.create')
    <!-- Modal create slider -->

    <!-- Modal edit slider -->
    @include('backend.sliders.edit')
    <!-- Modal edit slider -->

    <!-- Modal confirm delete slider -->
    <div class="modal fade" id="delete-slider-modal" tabindex="-1" role="dialog" aria-labelledby="delete-slider-label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-slider-label">
                        X??a slider
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete-id" name="id">
                    B???n c?? ch???c ch???n mu???n x??a slider <span id="modal-delete-name"></span> kh??ng?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        H???y
                    </button>
                    <button type="submit" class="btn btn-primary" id="button-submit-delete">
                        ?????ng ??
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal confirm delete delete -->

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
    <script src="{{ asset('admins/common/js/slider.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
@endsection
