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
        $user = $topic->user;
        $user->increaseXp(Topic::XP);
        $user->increaseTopicCount(); 
    }
}
