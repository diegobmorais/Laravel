<?php

namespace App\Jobs;

use App\Models\Award;
use App\Mail\AwardWinnerNotification;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWinnerNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $award;

    /**
     * Create a new job instance.
     *
     * @param Award $award
     *
     */
    public function __construct(Award $award)
    {
        $this->award = $award;
    }

    /**
     * Execute the job.
     */
    public function handle(Request $request)
    {
        // Lógica para enviar e-mail
        $data = $this->award;
        Mail::to($data->email)->send(new AwardWinnerNotification($this->award));
    }
}
