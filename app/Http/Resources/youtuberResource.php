<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class youtuberResource extends JsonResource
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
            'channel_title' => $this->channel_title,
            'youtuber_id' => $this->youtuber_id,
            "channel_id" => $this->channel_id,
            "publishedAt" => $this->published_at,
            "thumbnail_default" =>    $this->thumbnail_default,
            "thumbnail_medium" => $this->thumbnail_medium,
            "thumbnail_high" =>   $this->thumbnail_high,
            "view_count" =>   $this->view_count,
            "subscriber_count" => $this->subscriber_count,
            "video_count" =>  $this->video_count,
            "increase_count" => $this->count,
            "description" => $this->channel_description,
            "nickname" => $this->nickname,
            "banner" => $this->banner,
            "item_identify" => $this->item_identify,
            "nuxtLink" => $this->nuxtLinkPath,
            //"videos"    => VideoResource::collection($this->video)
        ];
    }
}
