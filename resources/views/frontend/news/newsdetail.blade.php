@extends('frontend.layouts.master')
@section('title', 'Tin tức')
@section('addCss')
    <link rel="stylesheet" href="{{ asset('assets/css/newsdetail.css') }}">
@endsection
@section('content')
    <div class="container">
        <div id="content" class="row site-content newsdetail">
            <div class="col-xl-9 newsdetail-left">
                <div class="newsdetail-title">
                    {{ $post->name }}
                </div>
                <div class="newsdetail-date">
                    <div class="newsdetail-date-card">
                        <img src="{{ asset('assets/images/newsdetail/date.png') }}" alt="">
                        <div>
                            {{ date('d/m/Y', strtotime($post->updated_at)) }}
                        </div>
                    </div>
                    <div class="newsdetail-view-card">
                        <i class="fa fa-eye mr-1"></i>
                        <div> {{ $post->number_view }} </div>
                    </div>
                </div>
                <div class="newsdetail-child">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="col-xl-3">
                <div class="newsdetail-right p-3">
                    <div class="newsdetail-right-title">
                        <h2>Tin liên quan</h2>
                    </div>
                    <div class="newsdetail-right-content">
                        <div class="row newsdetail-right-post">
                            @foreach ($relatedNews as $relatedNew)
                                <div class="col">
                                    <a href="{{ route('newsdetail.index', ['alias' => $relatedNew->alias]) }}">
                                        <h2>{{ $relatedNew->name }}</h2>
                                        <div class="d-flex justify-content-between mt-1">
                                            <div class="d-flex">
                                                <i class="fa fa-calendar mr-1"></i>
                                                <div>
                                                    {{ date('d/m/Y', strtotime($relatedNew->updated_at)) }}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <i class="fa fa-eye mr-1"></i>
                                                <div>
                                                    {{ $relatedNew->number_view }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <hr class="ml-3 mr-3">
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('addJs')
@endsection
