<?php

namespace App\Console\Commands;

use App\Models\AggregateCountLog;
use App\Models\ViewCountLog;
use App\Models\SubscribeCountLog;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * @property SubscribeCountLog subscribeCountLog
 */
class AggregateViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube:aggregation1day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var ViewCountLog
     */
    private $viewCountLog;

    /**
     *
     */
    private $sub1day;

    private $sub2day;

    private $viewConfig = [
        [
            "target_day" => 2,
            "identify"  => "1day"
        ],
        [
            "target_day" => 4,
            "identify"  => "3day"
        ],
        [
            "target_day" => 8,
            "identify"  => "7day"
        ]
    ];

    /**
     * Create a new command instance.
     *
     * @param ViewCountLog $viewCountLog
     * @param SubscribeCountLog $subscribeCountLog
     */
    public function __construct(ViewCountLog $viewCountLog, SubscribeCountLog $subscribeCountLog)
    {
        parent::__construct();
        $this->viewCountLog = $viewCountLog;
        $this->subscribeCountLog = $subscribeCountLog;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->viewConfig as $config){
            $this->aggregationViewlog($config["target_day"], $config["identify"]);
            $this->aggregationSubscribeLog($config["target_day"], $config["identify"]);
        }
    }

    /**
     * @param Int $subDay
     */
    private function getBeforeViewCountLog($subDay){
        $tmpDay = Carbon::now()->subDay($subDay)->format("Y-m-d");
        return $this->viewCountLog->where("exec_at", "=", $tmpDay)->groupBy("youtuber_id", "exec_at")->get();
    }

    /**
     * @param Int $subDay
     */
    private function getBeforeSubscribeCountLog($subDay){
        $tmpDay = Carbon::now()->subDay($subDay)->format("Y-m-d");
        return $this->subscribeCountLog->where("exec_at", "=", $tmpDay)->groupBy("youtuber_id", "exec_at")->get();
    }

    /**
     * @param $target_day
     * @param $identify
     */
    private function aggregationViewlog($target_day, $identify){

        // -1 昨日の総viewCountの取得
        $yesterdayCount = $this->getBeforeViewCountLog(1);
        // -2 一昨日の取得
        $sub2dayCount = $this->getBeforeViewCountLog($target_day);

        foreach ($yesterdayCount as $axis)
        {
            $sameId = $sub2dayCount->firstWhere("youtuber_id", $axis->youtuber_id);
            if( ! is_null($sameId)){
                $diffViewCount = $axis->view_count - $sameId->view_count;
                $this->info($axis->view_count);
                $this->info($sameId->view_count);
                $this->info(printf("youtuber_id : %s s diff view count on 1 day : %s views", $axis->youtuber_id, $diffViewCount));

                $aggCountLog = new AggregateCountLog();

                $aggCountLog->updateOrCreate(
                    [
                        "item_identify" => "view",
                        "day_identify" => $identify,
                        "exec_at" => Carbon::now()->format("Y-m-d"),
                        "youtuber_id" => $axis->youtuber_id
                    ],
                    [
                        "count" => $diffViewCount,
                    ]
                );
            }else{
                $this->info("nullやで");
                $aggCountLog = new AggregateCountLog();

                $aggCountLog->updateOrCreate(
                    [
                        "item_identify" => "view",
                        "day_identify" => $identify,
                        "exec_at" => Carbon::now()->format("Y-m-d"),
                        "youtuber_id" => $axis->youtuber_id
                    ],
                    [
                        "count" => 0,
                    ]
                );
            }
        }
    }


    /**
     * @param $target_day
     * @param $identify
     */
    private function aggregationSubscribeLog($target_day, $identify){

        // -1 昨日の総viewCountの取得
        $yesterdayCount = $this->getBeforeSubscribeCountLog(1);
        // -2 一昨日の取得
        $sub2dayCount = $this->getBeforeSubscribeCountLog($target_day);

        foreach ($yesterdayCount as $axis)
        {
            $sameId = $sub2dayCount->firstWhere("youtuber_id", $axis->youtuber_id);
            if( ! is_null($sameId)){
                $diffViewCount = $axis->view_count - $sameId->view_count;
                $this->info($axis->view_count);
                $this->info($sameId->view_count);
                $this->info(printf("youtuber_id : %s s diff subscribe count on 1 day : %s views", $axis->youtuber_id, $diffViewCount));

                $aggCountLog = new AggregateCountLog();

                $aggCountLog->updateOrCreate(
                    [
                        "item_identify" => "subscribe",
                        "day_identify" => $identify,
                        "exec_at" => Carbon::now()->format("Y-m-d"),
                        "youtuber_id" => $axis->youtuber_id
                    ],
                    [
                        "count" => $diffViewCount,
                    ]
                );
            }else{
                $this->info("nullやで");
                $aggCountLog = new AggregateCountLog();

                $aggCountLog->updateOrCreate(
                    [
                        "item_identify" => "subscribe",
                        "day_identify" => $identify,
                        "exec_at" => Carbon::now()->format("Y-m-d"),
                        "youtuber_id" => $axis->youtuber_id
                    ],
                    [
                        "count" => 0,
                    ]
                );
            }
        }
    }
}
