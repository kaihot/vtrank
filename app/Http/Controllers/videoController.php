<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Models\Video;
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
}
