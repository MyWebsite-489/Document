<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

/**
 * @return View
 */
class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::select(
            'id',
            'name',
            'description',
            'content',
            'thumbnail',
            'status',
            'created_at'
        )
            ->with('topics')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('backend.post.index', compact('posts'));
    }

    public function create()
    {
        $topics = Topic::select(
            'id',
            'name',
            'description',
            'thumbnail',
            'status',
            'created_at'
        )
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.post.create', compact('topics'));
    }

    /**
     *  go to edit post screen
     *
     *  @param Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post =  Post::select(
            'id',
            'name',
            'description',
            'content',
            'thumbnail',
            'status',
            'created_at'
        )
            ->with('topics')
            ->where('id', $request->id)
            ->first();
        $arrayTopicIds = array();
        foreach ($post->topics as $key => $topic) {
            $arrayTopicIds[$key] = $topic->id;
        }
        $post->topics = $arrayTopicIds;

        $topics = Topic::select(
            'id',
            'name',
            'description',
            'thumbnail',
            'status',
            'created_at'
        )
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.post.edit', compact('post', 'topics'));
    }

    /**
     *  add a post to the posts table
     *
     *  @param App\Http\Requests\PostRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = Post::select(
                'id',
                'name',
                'alias',
                'description',
                'thumbnail',
                'status',
            )->where('alias', Str::slug($request->input('name'), '-'))->first();

            $validator = Validator::make([], []);
            // post name exist
            if ($post != null) {
                $validator->errors()->add('name', 'Tên bài viết đã tồn tại!');
                return redirect()->route('admin.post.create')->withErrors($validator)->withInput();
            }
            // thumbnail not exist
            if (!$request->hasFile('thumbnail')) {
                $validator->errors()->add('thumbnail', 'Yêu cầu chọn thumbnail!');
                return redirect()->route('admin.post.create')->withErrors($validator)->withInput();
            }

            // check if the user has edited the thumbnail
            if ($request->hasFile('thumbnail')) {
                // save the thumbnail to storage and return the path
                $file = $request->file('thumbnail');
                $thumbnail = Common::uploadImage($file, 'posts/' . Str::random(25) . '.' . $file->getClientOriginalExtension());
                // update new path to db
                $request->thumbnail = 'storage/' . $thumbnail;
            }

            // add new post
            $newPost = Post::create([
                'name' => $request->input('name'),
                'alias' => Str::slug($request->input('name'), '-'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'thumbnail' => $request->thumbnail,
            ]);

            $newPost->topics()->sync($request->topics);
            DB::commit();
            return redirect()->route('admin.post.posts');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     *  update post
     *
     *  @param App\Http\Requests\PostRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request)
    {
        DB::beginTransaction();
        try {
            // get the post to update
            $postCheck = Post::select(
                'id',
                'name',
                'alias',
                'description',
                'thumbnail',
                'status',
            )
                ->where('id', '!=', $request->id)
                ->where('alias', Str::slug($request->input('name'), '-'))
                ->first();

            // post name exist
            if ($postCheck != null) {
                $validator = Validator::make([], []);
                $validator->errors()->add('name', 'Tên bài viết đã tồn tại!');
                return redirect()->route('admin.post.edit', ['id' => $request->id])->withErrors($validator)->withInput();
            }

            // get the post to update
            $post = Post::select(
                'id',
                'name',
                'alias',
                'description',
                'thumbnail',
                'status',
            )->where('id', $request->id)->first();

            // update post
            $post->name = $request->input('name');
            $post->alias = Str::slug($request->input('name'), '-');
            $post->status = $request->input('status');
            $post->content = $request->input('content');
            $post->description = $request->input('description');
            // check if the user has edited the thumbnail
            if ($request->hasFile('thumbnail')) {
                // save the thumbnail to storage and return the path
                $file = $request->file('thumbnail');
                $thumbnail = Common::uploadImage($file, 'posts/' . Str::random(25) . '.' . $file->getClientOriginalExtension(), $post->thumbnail);
                // update new path to db
                $post->thumbnail = 'storage/' . $thumbnail;
            };
            $post->save();
            $post->topics()->sync($request->topics);
            DB::commit();
            return redirect()->route('admin.post.posts');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     *  delete post
     *
     *  @param Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $post =  Post::select(
                'id',
                'name',
                'description',
                'content',
                'thumbnail',
                'status',
                'created_at'
            )
                ->with('topics')
                ->where('id', $request->id)
                ->first();
            // post not exist
            if ($post === null) {
                return response()->json(['success' => false, 'errors' => 'bài viết ko tồn tại!'], 400);
            }
            $post->topics()->detach();
            $post->delete();
            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }
}
