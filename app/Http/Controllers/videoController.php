<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Models\Video;
use function foo\func;
use Illuminate\Http\Request;

class videoController extends Controller
{
    private $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function recent()
    {
        $data = $this->video->orderBy("published_at", "desc")->paginate(9);
        return VideoResource::Collection($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function channelId($id)
    {
        $data = $this->video->whereHas("youtuber" ,function($q) use ($id){
                $q->where("channel_id", $id);
        })->orderBy("published_at", "desc")->paginate(9);
        return VideoResource::Collection($data);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function recommend(){
        $data = $this->video->inRandomOrder()->limit(5)->get();
        return VideoResource::Collection($data);
    }
}
