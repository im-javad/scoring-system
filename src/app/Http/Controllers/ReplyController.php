<?php

namespace App\Http\Controllers;

use App\Http\Requests\newReplyRequest;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;

class ReplyController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    
    public function store(newReplyRequest $request , Topic $topic)
    {
        $validator = $request->validated();

        $topic->replies()->create([
            'user_id' => auth()->user()->id,
            'text' => $validator['text']
        ]);
        
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->back($status = 201)->with('successAlert' , 'Reply created successfully');
    }
}
