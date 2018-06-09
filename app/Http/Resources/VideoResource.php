<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "published_at" => $this->published_at,
            "title" => $this->title,
            "thumbnail_high"    => $this->thumbnail_high,
            "view_count"    => $this->view_count,
            "player"    => $this->player,
            "video_id"  => $this->video_id,
            "youtuber"  => youtuberResource::make($this->youtuber)
        ];
    }
}
