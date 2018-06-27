<?php

namespace App\Http\Controllers;

use App\Http\Resources\youtuberResource;
use App\Models\Youtuber;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class vtController extends Controller
{

    private $youtuber;

    private $target_day;

    const PAGE_NUM = 20;

    public function __construct(Youtuber $youtuber)
    {
        $this->youtuber = $youtuber;

        //一旦1日前だとbatchが回ってなくてdataがなくなるかもしれないので、二日前のでーたを使用する
        $this->target_day = Carbon::now()->subDay(0)->format("Y-m-d");

    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function oneDayRanking()
    {
        $re = $this->youtuber
            ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
            ->where("acl.item_identify", "=", "view")
            ->where("acl.day_identify", "=", "1day")
            ->where("acl.exec_at", "=", $this->target_day)
            ->orderBy("acl.count", 'desc')
            ->paginate(self::PAGE_NUM);
        return youtuberResource::collection($re);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function threeDayRanking()
    {
        $re = $this->youtuber
            ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
            ->where("acl.item_identify", "=", "view")
            ->where("acl.day_identify", "=", "3day")
            ->where("acl.exec_at", "=", $this->target_day)
            ->orderBy("acl.count", 'desc')
            ->paginate(self::PAGE_NUM);
        return youtuberResource::collection($re);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function sevenDayRanking()
    {
        $re = $this->youtuber
            ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
            ->where("acl.item_identify", "=", "view")
            ->where("acl.day_identify", "=", "7day")
            ->where("acl.exec_at", "=", $this->target_day)
            ->orderBy("acl.count", 'desc')
            ->paginate(self::PAGE_NUM);
        return youtuberResource::collection($re);
    }

    public function oneDaySubscribeRanking()
    {
        $re = $this->youtuber
            ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
            ->where("acl.item_identify", "=", "subscribe")
            ->where("acl.day_identify", "=", "1day")
            ->where("acl.exec_at", "=", $this->target_day)
            ->orderBy("acl.count", 'desc')
            ->paginate(self::PAGE_NUM);
        return youtuberResource::collection($re);
    }
    public function threeDaySubscribeRanking()
    {
        $re = $this->youtuber
            ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
            ->where("acl.item_identify", "=", "subscribe")
            ->where("acl.day_identify", "=", "3day")
            ->where("acl.exec_at", "=", $this->target_day)
            ->orderBy("acl.count", 'desc')
            ->paginate(self::PAGE_NUM);
        return youtuberResource::collection($re);
    }
    public function sevenDaySubscribeRanking()
    {
        $re = $this->youtuber
            ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
            ->where("acl.item_identify", "=", "subscribe")
            ->where("acl.day_identify", "=", "7day")
            ->where("acl.exec_at", "=", $this->target_day)
            ->orderBy("acl.count", 'desc')
            ->paginate(self::PAGE_NUM);
        return youtuberResource::collection($re);
    }

    /**
     * @param $id
     * @return static
     */
    public function channel($id)
    {
        $data = $this->youtuber->where("channel_id","=", $id)->first();
        return youtuberResource::make($data);
    }

    /**
     *
     */
    public function top()
    {
        $data = [];
        foreach (["1day", "3day", "7day"] as $item) {
            foreach (["subscribe", "view"] as $iden) {
                $d = $this->youtuber
                    ->join("aggregate_count_log as acl", "acl.youtuber_id", "=", "youtubers.id")
                    ->where("acl.item_identify", "=", $iden)
                    ->where("acl.day_identify", "=", $item)
                    ->where("acl.exec_at", "=", $this->target_day)
                    ->orderBy("acl.count", 'desc')
                    ->first();
                $key = sprintf("%s %s No1", $item, $iden);
                $data[$key] = youtuberResource::make($d);;
            }
        }

        return $data;
    }
}
