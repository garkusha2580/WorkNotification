<?php

namespace App\Jobs;

use App\Mail\NotificationMail;
use App\Models\CrossNotif;
use Carbon\Carbon;
use function GuzzleHttp\Promise\queue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotificationQueuer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sendDelay;

    /**
     * Create a new job instance.
     * @param $delay
     * @return void
     */
    public function __construct($delay = 0)
    {
        $this->sendDelay = Carbon::now()->addMinutes(ceil($delay));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notifs = CrossNotif::with(["data", "user"])
            ->where('status', "=", 0);
        $notifs->update(['status' => 1]);
        $notifs->get()
            ->map(function ($row) {
                \Mail::to($row->user->email)->later($this->sendDelay, new NotificationMail($row->data));
            });


    }
}
