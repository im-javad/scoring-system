<?php

namespace App\Http\Controllers;

use App\Http\Requests\newTopicRequest;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;

class TopicController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $topics = Topic::all();

        return view('topics.index' , compact('topics'));
    }
    
    public function new()
    {
        return view('topics.new');
    }

    public function store(newTopicRequest $request)
    {
        $validator = $request->validated();

        $topic = auth()->user()->topics()->create($validator);
        
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('topic.show' , $topic)->with('successAlert' , 'Topic created successfully');
    }

    public function show(Topic $topic)
    {
        $replies = $topic->replies;
        
        return view('topics.show' , compact('topic' , 'replies'));
    }
}
