<?php

namespace App\Http\Controllers;

use App\Http\Requests\newBadgeRequest;
use App\Models\Badge;
use Illuminate\Http\Resources\Json\JsonResource;

class BadgeController extends Controller
{
    public function new()
    {
        return view('badges.new');
    }

    public function store(newBadgeRequest $request)
    {
        $validator = $request->validated();

        Badge::create($validator);

        return $request->wantsJson() 
            ? new JsonResource([] , 204)
            : redirect()->back($status = 201)->with('successAlert' , 'Badge created successfully');
    }
}
