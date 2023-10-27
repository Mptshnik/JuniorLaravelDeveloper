<?php

namespace App\Observers;

use App\Models\Group;
use App\Models\User;
use App\Models\GroupUser;

class GroupUserObserver
{
    public function created(GroupUser $groupUser){
        $group = $groupUser->group;

        $rowPivot = $group->users()->where('user_id', $groupUser->user_id)->first()->pivot;
        $rowPivot->expired_at = now()->addHours($group->expire_hours);
        $rowPivot->save();
    }
}
