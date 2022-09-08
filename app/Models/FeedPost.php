<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'feed_type',
        'feed_id',
        'post_id',
    ];

    const FEED_TYPE_SQ1 = 'sq1';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
