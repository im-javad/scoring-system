<?php

namespace App\Observers;

use App\Models\UserStatus;
use App\Services\Badge\ApplierBadges;

class UserStatusObserver
{
    /**
     * Handle the UserStatus "updated" event.
     */
    public function updated(UserStatus $userStatus)
    {
        resolve(ApplierBadges::class)->run($userStatus);
    }
}
