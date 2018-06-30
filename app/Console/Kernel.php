<?php

namespace App\Console;

use App\Console\Commands\AggregateViewCount;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        '\App\Console\Commands\AggregateViewCount',
        '\App\Console\Commands\getChannel',
        '\App\Console\Commands\getChannelVideos',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('youtube:aggregation1day')->cron('1 0-23/4 * * *');
        $schedule->command('youtube:getChannel')->cron('0 0-23/4 * * *');
        $schedule->command('youtube:getChannelVideos')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
