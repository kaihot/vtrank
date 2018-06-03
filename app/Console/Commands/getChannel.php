<?php

namespace App\Console\Commands;

use App\Models\Youtuber;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\Log;

class getChannel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube:getChannel';

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
     * @return void
     */
    public function __construct(Youtuber $youtouber)
    {
        parent::__construct();
        $this->youtuber = $youtouber;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$yt = new youtube(env("YOUTUBE_API_KEY"));
//        $channel = Youtube::getChannelById('UCOefINa2_BmpuX4BbHjdk9A');
//        $this->info($channel->snippet->title);
//        $this->info($channel->snippet->description);
//        $this->info(var_dump($channel->snippet->thumbnails));
//        $this->info(var_dump($channel->statistics));
//        dd($channel);
//
//        $videos = Youtube::listChannelVideos('UC4YaOt1yT-ZeyB0OmxHgolA', 2, "date");
//        $relatedVideos = Youtube::getRelatedVideos("Inju8L5k0gs");
//        $videoInfo = Youtube::getVideoInfo(["Inju8L5k0gs","QUd6LFDP9qE"]);
//        dd($videoInfo);
        //$this->info($channel->snippet->publishedAt);

        //get all youtuber
        $youtubers = $this->youtuber->get();
        //dd($youtubers);

        foreach ($youtubers as $youtuber){
            $this->info($youtuber->channel_id);
            $channel = Youtube::getChannelById($youtuber->channel_id);
            $data = [
                "channel_title"     => $channel->snippet->title,
                "channel_description" => $channel->snippet->description,
                "published_at"      => Carbon::parse($channel->snippet->publishedAt)->format("Y-m-d h:m:s"),
                "thumbnail_default" => $channel->snippet->thumbnails->default->url,
                "thumbnail_medium"  => $channel->snippet->thumbnails->medium->url,
                "thumbnail_high"    => $channel->snippet->thumbnails->high->url,
                "view_count"    => $channel->statistics->viewCount,
                "subscriber_count"  => $channel->statistics->subscriberCount,
                "video_count"   => $channel->statistics->videoCount
            ];
            $youtuber->fill($data)->save();

        }





    }
}
