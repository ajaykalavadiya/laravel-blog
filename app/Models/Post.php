<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Cachable;
    use HasFactory;

    protected $cachePrefix = "posts";

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'publication_date',
    ];

    protected $casts = [
        'publication_date' => 'datetime',
    ];

    public function feed()
    {
        return $this->hasOne(FeedPost::class);
    }
}
