<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ViewCountLog
 * @package App\Models
 * @property \DateTime $exec_at
 * @property String $view_count
 */
class ViewCountLog extends Model
{
    protected $table = "view_count_log";
}
