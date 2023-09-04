<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Reply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'body',
        'user_id',
        'replyable_id',
        'replyable_type',
    ];

    public function replyable(): MorphTo
    {
        return $this->morphTo();
    }

    public function nestedReplies(): BelongsToMany
    {
        return $this->belongsToMany(Reply::class, 'nested_reply', 'child_reply_id', 'parent_reply_id')
            ->latest()
            ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
