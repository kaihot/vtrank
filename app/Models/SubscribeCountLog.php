<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SubscribeCountLog
 * @package App\Models
 * @property \DateTime $exec_at
 * @property String $subscribe_count
 */
class SubscribeCountLog extends Model
{
    protected $table = "subscribe_count_log";
    protected $fillable = [
        "youtuber_id",
        "exec_at",
        "subscribe_count"
    ];
}
