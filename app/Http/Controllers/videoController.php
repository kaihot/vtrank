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

    public function recent()
    {
        $data = $this->video->orderBy("published_at", "desc")->paginate(5);
        return VideoResource::Collection($data);
    }

    public function channelId($id)
    {
        $data = $this->video->whereHas("youtuber" ,function($q) use ($id){
                $q->where("channel_id", $id);
        })->orderBy("published_at", "desc")->paginate(5);
        return VideoResource::Collection($data);
    }
}
