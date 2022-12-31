<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\TopicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicDocumentController extends Controller
{
    public function index(Request $request)
    {
        $topics = TopicDocument::select('id', 'name', 'status', 'created_at')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('backend.topic-document.index', compact('topics'));
    }
    public function store(Request $request)
    {
        try {
            // add new Topic
            TopicDocument::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }
    public function edit($id)
    {
        $topic = TopicDocument::findOrFail($id);
        // topic not exist
        if ($topic === null) {
            return response()->json(['success' => false, 'errors' => 'chủ đề ko tồn tại!'], 400);
        }
        return response()->json(['success' => true, 'topic' => $topic], 200);;
    }
    public function update(Request $request, $id)
    {
        try {
            $topic = TopicDocument::findOrFail($id);

            // topic exist
            if ($topic == null) {
                return response()->json(['success' => false, 'errors' => 'chủ đề không tồn tại!'], 400);
            }

            // update topic
            $topic->name = $request->name;
            $topic->status = $request->status;
            $topic->save();
            return response()->json(['success' => true, 'topic' => $topic], 200);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try {
            $topic = TopicDocument::findOrFail($id);
            if ($topic === null) {
                return response()->json(['success' => false, 'errors' => 'chủ đề ko tồn tại!'], 400);
            }
            $topic->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => $e], 500);
        }
    }
}
