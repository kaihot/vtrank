<?php

namespace App\Console\Commands;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Console\Command;

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
        $videos = Youtube::listChannelVideos('UC4YaOt1yT-ZeyB0OmxHgolA', 2, "date");
        $videoInfo = Youtube::getVideoInfo(["Inju8L5k0gs","QUd6LFDP9qE"]);
        dd($videos);
    }
}
