<?php

namespace App\Console\Commands;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Video;
use App\Models\Youtuber;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class getChannelVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube:getChannelVideos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $youtuber;

    /**
     * Create a new command instance.
     *
     * @param Youtuber $youtuber
     * @internal param Youtuber $youtuber
     */
    public function __construct(Youtuber $youtuber)
    {
        parent::__construct();
        $this->youtuber = $youtuber;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $youtubers = $this->youtuber->get();
        foreach ($youtubers as $youtuber)
        {
            $this->info($youtuber->channel_id);
            $videos = collect(Youtube::listChannelVideos($youtuber->channel_id, 10, "date"));
            $videoInfos = Youtube::getVideoInfo($videos->pluck("id.videoId")->toArray());

            foreach ($videoInfos as $videoInfo)
            {
                $this->info($videoInfo->id);
                $fillable = [
                    "published_at" => $videoInfo->snippet->publishedAt,
                    "title" => $videoInfo->snippet->title,
                    "thumbnail_default" => $videoInfo->snippet->thumbnails->default->url,
                    "thumbnail_medium"   => $videoInfo->snippet->thumbnails->medium->url,
                    "thumbnail_high"    => $videoInfo->snippet->thumbnails->high->url,
                    "tags" => implode(",", $videoInfo->snippet->tags),
                    "view_count" => $videoInfo->statistics->viewCount,
                    "like_count" => $videoInfo->statistics->likeCount,
                    "dislike_count" => $videoInfo->statistics->dislikeCount,
                    "player" => $videoInfo->player->embedHtml,
                ];
                $base = [
                    "video_id" => $videoInfo->id,
                    "youtuber_id" => $youtuber->id,
                ];
                $model = new Video();
                $model->updateOrCreate(
                    $base,
                    $fillable
                );
            }
            dd($videos->pluck("id.videoId")->toArray(), $videoInfo);
        }
    }
}
