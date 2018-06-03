<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Youtuber
 * @package App\Models
 */
class Youtuber extends Model
{
    protected $table = "youtubers";
    protected $fillable = [
        "channel_id", "channel_title", "channel_description", "published_at",
        "thumbnail_default", "thumbnail_medium", "thumbnail_high", "view_count",
        "subscriber_count", "video_count"
    ];
}
