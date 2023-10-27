<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupUser extends Pivot
{
    protected $table = "group_user";
    protected $guarded = false;
    public $timestamps = false;

    public function group():BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, );
    }
}
