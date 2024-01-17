<?php

namespace App\Console\Commands;

use App\Jobs\SendWinnerNotification;
use App\Models\Award;
use Illuminate\Console\Command;

class CheckWinnerPrizes extends Command
{
    protected $signature = 'check:winner-prizes';
    protected $description = 'Check for upcoming prize draws and send winner notifications.';

    public function handle()
    {
        // Lógica para verificar prêmios e enviar notificações
        $upcomingPrizes = Award::where('draw_date', '<=', now())->get();

        foreach ($upcomingPrizes as $prize) {
            SendWinnerNotification::dispatch($prize);
        }
    }
}
