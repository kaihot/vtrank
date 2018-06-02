<?php

namespace App\Console\Commands;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$yt = new youtube(env("YOUTUBE_API_KEY"));
        $channel = Youtube::getChannelById('UCOefINa2_BmpuX4BbHjdk9A');
        $this->info($channel->snippet->title);
        $this->info($channel->snippet->description);
        $this->info(var_dump($channel->snippet->thumbnails));
        $this->info(var_dump($channel->statistics));
        dd($channel);

        $videos = Youtube::listChannelVideos('UC4YaOt1yT-ZeyB0OmxHgolA', 2, "date");
        $relatedVideos = Youtube::getRelatedVideos("Inju8L5k0gs");
        $videoInfo = Youtube::getVideoInfo(["Inju8L5k0gs","QUd6LFDP9qE"]);
        dd($videoInfo);
        //$this->info($channel->snippet->publishedAt);


    }
}
