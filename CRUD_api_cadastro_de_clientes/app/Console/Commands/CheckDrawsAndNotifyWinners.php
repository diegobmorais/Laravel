<?php

namespace App\Console\Commands;

use App\Mail\AwardWinnerNotification;
use App\Models\Award;
use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckDrawsAndNotifyWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'app:check-draws-and-notify-winners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $upcomingDraws = Award::whereDate('draw_date', now()->addMinutes(1)->toDateString())->get();

        foreach ($upcomingDraws as $draw) {

            $upcomingDraws = Award::whereDate('draw_date', now()->addMinutes(1)->toDateString())
                ->where('notified_winners', false)
                ->get();

            foreach ($upcomingDraws as $draw) {
                // Lógica para determinar o(s) ganhador(es)
                $participants = Client::all();

                if ($participants->isEmpty()) {
                    $this->info('Nenhum participante encontrado para o sorteio.');
                    continue;
                }

                $winner = $participants->random(); // Escolhe um ganhador aleatório

                // Notifica o ganhador por e-mail
                Mail::to($winner->email)->send(new AwardWinnerNotification($draw));

                // Atualiza o status do sorteio para indicar que o e-mail foi enviado
                $draw->update(['notified_winners' => true]);

                $this->info('Ganhador notificado para o sorteio ID ' . $draw->id);
            }

            $this->info('Verificação de sorteios concluída.');
        }
    }
}
