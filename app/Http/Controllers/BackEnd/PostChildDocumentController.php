<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\PostChildDocument;
use App\Models\TopicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostChildDocumentController extends Controller
{
    public function index(Request $request)
    {
        $posts = PostChildDocument::select(
            'post_child_documents.id',
            'post_child_documents.name',
            'post_child_documents.description',
            'post_child_documents.content',
            'post_child_documents.status',
            'post_child_documents.created_at',
            'topic_documents.name as topic',
        )
            ->leftJoin('topic_documents', 'topic_documents.id', 'post_child_documents.topic_document_id')
            ->where('post_child_documents.name', 'LIKE', '%' . $request->search . '%')
            ->orderBy('post_child_documents.created_at', 'DESC')
            ->paginate(10);
        return view('backend.post-child.index', compact('posts'));
    }
    public function create()
    {
        $topics = TopicDocument::select(
            'id',
            'name',
            'status',
            'created_at'
        )
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.post-child.create', compact('topics'));
    }
    public function store(Request $request)
    {
        try {
            // add new post
            $newPost = PostChildDocument::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'topic_document_id' => $request->topic_document_id,
            ]);

            return redirect()->route('admin.post-child.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $post = PostChildDocument::findOrFail($id);
        // topic not exist
        $topics = TopicDocument::select(
            'id',
            'name',
            'status',
            'created_at'
        )
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.post-child.edit', compact('post', 'topics'));
    }
    public function update(Request $request, $id)
    {
        try {
            $post = PostChildDocument::findOrFail($id);

            if ($post == null) {
                return response()->json(['success' => false, 'errors' => 'bài viết không tồn tại!'], 400);
            }

            $post->name = $request->name;
            $post->status = $request->status;
            $post->content = $request->content;
            $post->description = $request->description;
            $post->topic_document_id = $request->topic_document_id;
            $post->save();
            return redirect()->route('admin.post-child.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try {
            $post = PostChildDocument::findOrFail($id);
            if ($post === null) {
                return response()->json(['success' => false, 'errors' => 'Bài viết ko tồn tại!'], 400);
            }
            $post->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }
}
