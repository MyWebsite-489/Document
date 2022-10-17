@extends('frontend.documents.layouts.master')
@section('title', 'Tài liệu')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Blog</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if(isset($postContent))
                {!! $postContent->content !!}
            @endif
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
