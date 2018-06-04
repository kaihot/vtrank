<?php

namespace App\Console\Commands;

use App\Models\AggregateCountLog;
use App\Models\ViewCountLog;
use Carbon\Carbon;
use Illuminate\Console\Command;

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

    /**
     * Create a new command instance.
     *
     * @param ViewCountLog $viewCountLog
     */
    public function __construct(ViewCountLog $viewCountLog)
    {
        parent::__construct();
        $this->viewCountLog = $viewCountLog;
        $this->sub1day = Carbon::now()->subDay(1)->format("Y-m-d");
        $this->sub2day = Carbon::now()->subDay(2)->format("Y-m-d");
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->aggregation1daylog();
    }

    private function aggregation1daylog(){

        // -1 昨日の総viewCountの取得
        $yesterdayCount = $this->viewCountLog->where("exec_at", "=", $this->sub1day)->groupBy("youtuber_id", "exec_at")->get();
        // -2 一昨日の取得
        $sub2dayCount = $this->viewCountLog->where("exec_at", "=", $this->sub2day)->groupBy("youtuber_id", "exec_at")->get();

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
                        "day_identify" => "1day",
                        "exec_at" => Carbon::now()->format("Y-m-d"),
                        "youtuber_id" => $axis->youtuber_id
                    ],
                    [
                        "count" => $diffViewCount,
                    ]
                );


            }
        }
    }
}
