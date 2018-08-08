<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ThreadReply.
 *
 * @mixin \Eloquent
 * @property-read \App\Models\User $user
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property int $id
 * @property bool $is_marked
 * @property int $thread_id
 * @property \Carbon\Carbon|null $updated_at
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereIsMarked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadReply whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThreadReply[] $likers
 */
class ThreadReply extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'is_marked' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
