<?php

namespace App\Console;

use App\Jobs\CalculateRankForPublishers;
use App\Models\PublisherScore;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new CalculateRankForPublishers(now()->subWeek(), PublisherScore::PERIOD_WEEK))
            ->weeklyOn(Schedule::SUNDAY);
        $schedule->job(new CalculateRankForPublishers(now()->subMonth(), PublisherScore::PERIOD_MONTH))
            ->monthlyOn();
        $schedule->job(new CalculateRankForPublishers(now()->subYear(), PublisherScore::PERIOD_YEAR))
            ->yearlyOn();
        $schedule->command('sitemap:generate')->daily();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require_once base_path('routes/console.php');
    }
}
