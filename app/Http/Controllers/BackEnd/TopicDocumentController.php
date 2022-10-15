<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\TopicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicDocumentController extends Controller
{
    public function index(Request $request) {
        $topics = TopicDocument::select('id', 'name', 'status', 'created_at')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(DEFAULT_PAGINATE);
        return view('backend.topic-document.index', compact('topics'));
    }
    public function store(Request $request) {
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

}
