@extends('frontend.layouts.master')
@section('title', 'Tin tức')
@section('addCss')
    <link rel="stylesheet" href="{{ asset('assets/css/newslist.css') }}">
@endsection
@section('content')
    <section class="intro">
        <div class="container">
            <div class="row">
                @if (isset($posts[0]))
                    <div class="col">
                        <div class="content">
                            <h1 class="title">{{ $posts[0]->name }}</h1>
                            <p class="lead">{{ $posts[0]->description }}</p>

                            <a href="{{ route('newsdetail.index', ['alias' => $posts[0]->alias,'time' => date('Ymd', strtotime($posts[0]->updated_at))]) }}"
                                class="link">Xem bài viết</a>
                        </div>
                    </div>
                    <div class="col-3">
                        <img class="img" src="{{ asset($posts[0]->thumbnail) }}" alt="seo img" />
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="container newslist-wrap">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-3 mt-3">
                    <div class="card">
                        <div class="card-img-top newslist-thumbnail">
                            <a
                                href="{{ route('newsdetail.index', ['alias' => $post->alias, 'time' => date('Ymd', strtotime($post->updated_at))]) }}">
                                <img class="" src="{{ asset($post->thumbnail) }}" alt="{{ $post->name }}">
                            </a>
                        </div>
                        <div class="card-body p-2 newslist-content">
                            <a href="{{ route('newsdetail.index', ['alias' => $post->alias, 'time' => date('Ymd', strtotime($post->updated_at))]) }}"
                                class="card-title">{{ $post->name }}</a>
                            <div class="card-text">{{ $post->description }}</div>
                        </div>
                        <div class="card-footer p-2">
                            <div class="newslist-date">
                                <i class="fa fa-calendar mr-1"></i>
                                <div class="newslist-share-text">
                                    {{ date('d/m/Y', strtotime($post->updated_at)) }}
                                </div>
                            </div>
                            <div class="newslist-date">
                                <i class="fa fa-eye mr-1"></i>
                                <div class="newslist-share-text">
                                    {{ $post->number_view }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $posts->appends($_GET)->links('frontend.partials.paginate') }}
        </div>
    </section>
@endsection
