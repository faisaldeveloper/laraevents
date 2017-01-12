<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Storage;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        \App\Console\Commands\Inspire::class,
        //\App\Console\Commands\SendEmails::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         
        $schedule->call(function(){
            $message = 'time --->>> '.date('d/m/Y H:i:s');
            Storage::put('loginactivity2.txt', $message);            
        })->hourly();        
        ////////////////
        $schedule->command('inspire')->hourly();
    }
}
