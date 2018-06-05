<?php

namespace App\Console\Commands;

use Alaouy\Youtube\Facades\Youtube;
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
            $videos = collect(Youtube::listChannelVideos($youtuber->channel_id, 2, "date"));
            $videoInfo = Youtube::getVideoInfo($videos->pluck("id.videoId")->toArray());
            dd($videos->pluck("id.videoId")->toArray(), $videoInfo);
        }
    }
}
