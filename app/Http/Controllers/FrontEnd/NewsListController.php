<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsListController extends Controller
{
    /**
     *  show news detail screen
     *
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select(
            'id',
            'name',
            'alias',
            'description',
            'thumbnail',
            'number_view',
            'updated_at'
        )->where('status', 'publish')
            ->orderBy('updated_at', 'DESC')
            ->paginate(12);
        return view('frontend.news.newslist', compact('posts'));
    }
}
