<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\PostChildDocument;
use App\Models\TopicDocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index($id)
    {
        $topics = TopicDocument::select('*')
                ->orderBy('created_at')
                ->get();
        $postContent = PostChildDocument::find($id);
        return view('frontend.documents.index', compact('topics', 'postContent'));
    }
}
