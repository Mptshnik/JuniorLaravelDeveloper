<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $guarded = false;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(GroupUser::class)->withPivot('expired_at');
    }
}
