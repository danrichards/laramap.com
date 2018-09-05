<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;
use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;

/**
 * App\Models\ArticleReply.
 *
 * @property int $id
 * @property int $article_id
 * @property int $user_id
 * @property string $body
 * @property bool $is_marked
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Article $article
 * @property-read \Cog\Laravel\Love\LikeCounter\Models\LikeCounter $dislikesCounter
 * @property-read bool $disliked
 * @property-read int $dislikes_count
 * @property-read bool $liked
 * @property-read int $likes_count
 * @property-read int $likes_diff_dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cog\Laravel\Love\Like\Models\Like[] $likesAndDislikes
 * @property-read \Cog\Laravel\Love\LikeCounter\Models\LikeCounter $likesCounter
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply orderByDislikesCount($direction = 'desc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply orderByLikesCount($direction = 'desc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereDislikedBy($userId = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereIsMarked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereLikedBy($userId = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleReply whereUserId($value)
 * @mixin \Eloquent
 */
class ArticleReply extends Model implements LikeableContract
{
    use Likeable;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
