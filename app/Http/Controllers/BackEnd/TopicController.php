<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

/**
 * @return View
 */
class TopicController extends Controller
{

    /**
     *  go to topics table screen
     *
     *  @param Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $topics = Topic::select('id', 'name', 'description', 'thumbnail', 'status', 'created_at')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('backend.topic.index', compact('topics'));
    }

    /**
     *  add a topic to the topics table
     *
     *  @param App\Http\Requests\TopicRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function create(TopicRequest $request)
    {
        DB::beginTransaction();
        try {
            $topic = Topic::select(
                'id',
                'name',
                'alias',
                'description',
                'thumbnail',
                'user_id',
                'status',
            )->where('alias', Str::slug($request->input('name'), '-'))->first();

            // topic exist
            if ($topic !== null) {
                return response()->json(['success' => false, 'errors' => 'chủ đề đã tồn tại!'], 400);
            }

            // check if the user has edited the thumbnail
            if ($request->hasFile('thumbnail')) {
                // save the thumbnail to storage and return the path
                $file = $request->file('thumbnail');
                $thumbnail = Common::uploadImage($file, 'topics/' . Str::random(25) . '.' . $file->getClientOriginalExtension());
                // update new path to db
                $request->thumbnail = 'storage/' . $thumbnail;
            };
            // add new Topic
            Topic::create([
                'name' => $request->input('name'),
                'alias' => Str::slug($request->input('name'), '-'),
                'description' => $request->input('description'),
                'thumbnail' => $request->thumbnail,
                'user_id' => $request->input('user_id'),
                'status' => $request->input('status'),
            ]);
            DB::commit();
            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }

    /**
     *  go to get topic detail
     *
     *  @param Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $topic = Topic::select(
            'id',
            'name',
            'description',
            'thumbnail',
            'user_id',
            'status',
        )->where('id', $request->id)->first();
        // topic not exist
        if ($topic === null) {
            return response()->json(['success' => false, 'errors' => 'chủ đề ko tồn tại!'], 400);
        }
        return response()->json(['success' => true, 'topic' => $topic], 200);;
    }

    /**
     *  update Topic
     *
     *  @param App\Http\Requests\TopicRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request)
    {
        DB::beginTransaction();
        try {

            $topicCheck = Topic::select(
                'id',
                'name',
                'alias',
                'description',
                'thumbnail',
                'user_id',
                'status',
            )
                ->where('id', '!=', $request->id)
                ->where('alias', Str::slug($request->input('name'), '-'))
                ->first();

            // topic exist
            if ($topicCheck != null) {
                return response()->json(['success' => false, 'errors' => 'chủ đề đã tồn tại!'], 400);
            }

            // get the Topic to update
            $topic = Topic::select(
                'id',
                'name',
                'alias',
                'description',
                'thumbnail',
                'user_id',
                'status',
            )->where('id', $request->id)->first();

            // topic not exist
            if ($topic == null) {
                return response()->json(['success' => false, 'errors' => 'chủ đề ko tồn tại!'], 400);
            }

            // update topic
            $topic->name = $request->input('name');
            $topic->alias = Str::slug($request->input('name'), '-');
            $topic->description = $request->input('description');
            if ($request->user_id && $request->user_id != $topic->user_id) {
                $topic->user_id = $request->input('user_id');
            }
            $topic->status = $request->input('status');
            // check if the user has edited the thumbnail
            if ($request->hasFile('thumbnail')) {
                // save the thumbnail to storage and return the path
                $file = $request->file('thumbnail');
                $thumbnail = Common::uploadImage($file, 'topics/' . Str::random(25) . '.' . $file->getClientOriginalExtension(), $topic->thumbnail);
                // update new path to db
                $topic->thumbnail = 'storage/' . $thumbnail;
            };
            if (!empty($topic)) {
                $topic->save();
                DB::commit();
            }
            return response()->json(['success' => true, 'topic' => $topic], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     *  delete topic
     *
     *  @param Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $topic =  Topic::select(
                'id',
                'name',
                'description',
                'thumbnail',
                'status',
                'created_at'
            )
                ->with('posts')
                ->where('id', $request->id)
                ->first();
            // topic not exist
            if ($topic === null) {
                return response()->json(['success' => false, 'errors' => 'chủ đề ko tồn tại!'], 400);
            }
            $topic->posts()->detach();
            $topic->delete();
            DB::commit();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }
}
