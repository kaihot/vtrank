<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AggregateCountLog
 * @package App\Models
 */
class AggregateCountLog extends Model
{
    protected $table = "aggregate_count_log";
    protected $fillable = [
        "item_identify",
        "day_identify",
        "count",
        "exec_at",
        "channel_id"
    ];

}
