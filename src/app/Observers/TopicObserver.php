<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{
    /**
     * Handle the Topic "created" event.
     */
    public function created(Topic $topic): void
    {
        $topic->user->increaseXp(Topic::XP);
    }
}
