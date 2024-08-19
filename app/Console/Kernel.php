<?php

namespace App\Console;

use App\Console\Commands\Assinaturas\VerificarHorasAssinatura;
use App\Console\Commands\Assinaturas\VerificarSubAtiva;
use App\Console\Commands\Assinaturas\VerificarSubCanceladas;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
         $schedule->command(VerificarSubAtiva::class)->hourly();
         $schedule->command(VerificarSubCanceladas::class)->hourly();
         $schedule->command(VerificarHorasAssinatura::class)->weekly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
