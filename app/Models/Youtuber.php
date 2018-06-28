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
        "subscriber_count", "video_count", "banner"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function viewCountLog(){
        return $this->hasMany("App\Models\ViewCountLog", "youtuber_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribeCountLog(){
        return $this->hasMany("App\Models\SubscribeCountLog", "youtuber_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aggregateCountLog(){
        return $this->hasMany("App\Models\AggregateCountLog", "youtuber_id")->orderBy("count", "ASC");
    }


    public function video(){
        return $this->hasMany("App\Models\Video");
    }

    public function getNuxtLinkPathAttribute()
    {
        $day = "one-day";
        switch ($this->day_identify){
            case "1day":
                $day = "one-day";
                break;
            case "3day":
                $day = "three-day";
                break;
            case "7day":
                $day = "seven-day";
                break;
            default:
                $day = "one-day";
                break;
        }
        return sprintf("%s-%s-ranking", $day, $this->item_identify);
    }

}