<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class NewsDetailController extends Controller
{
    /**
     *  display the news list screen
     *
     *  @param string $alias
     *  @return \Illuminate\Http\Response
     */
    public function index($alias)
    {
        DB::beginTransaction();
        try {
            $post = Post::select(
                'id',
                'name',
                'alias',
                'content',
                'number_view',
                'updated_at'
            )
                ->with('topics')
                ->where('alias', $alias)
                ->first();

            $topicIds = array();
            foreach ($post->topics as $key => $topic) {
                $topicIds[$key] = $topic->id;
            }

            $hotNews = Post::select(
                'id',
                'name',
                'alias',
                'content',
                'number_view',
                'updated_at'
            )
                ->where('id', '!=', $post->id)
                ->where('status', 'publish')
                ->orderBy('number_view', 'DESC')
                ->take(5)->get();

            $relatedNews = Post::select(
                'id',
                'name',
                'alias',
                'content',
                'number_view',
                'updated_at'
            )
                ->whereHas('topics', function ($q) use ($topicIds) {
                    $q->whereIn('id', $topicIds);
                })
                ->where('id', '!=', $post->id)
                ->where('status', 'publish')
                ->orderBy('number_view', 'DESC')
                ->take(5)->get();

            $post->number_view = $post->number_view + 1;
            $post->save();
            DB::commit();
            return view('frontend.news.newsdetail', compact('post', 'hotNews', 'relatedNews'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}
