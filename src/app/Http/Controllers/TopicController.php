<?php

namespace App\Http\Controllers;

use App\Http\Requests\newTopicRequest;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

        auth()->user()->topics()->create($validator);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->back($status = 201)->with('successAlert' , 'Topic created successfully');
    }

    public function show(Topic $topic)
    {
        return view('topics.show' , compact('topic'));
    }
}
