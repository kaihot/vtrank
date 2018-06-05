<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos";

    protected $fillable = [
            "youtuber_id", "published_at", "title", "thumbnail_default", "thumbnail_medium",
            "thumbnail_high", "tags", "view_count", "like_count", "dislike_count", "player", "video_id"
        ];

}
