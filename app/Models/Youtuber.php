<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Youtuber
 * @package App\Models
 * @method Model|Youtuber|Collection|Youtuber[] get()
 *
 */
class Youtuber extends Model
{
    protected $table = "youtubers";
    protected $fillable = [
        "channel_id", "channel_title", "channel_description", "published_at",
        "thumbnail_default", "thumbnail_medium", "thumbnail_high", "view_count",
        "subscriber_count", "video_count"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function viewCountLog(){
        return $this->belongsTo("ViewCountLog::class", "youtuber_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscribeCountLog(){
        return $this->belongsTo("SubscribeCountLog:class", "youtuber_id");
    }
}