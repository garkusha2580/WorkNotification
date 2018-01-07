<?php

namespace App\Jobs;

use App\Mail\NotificationMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class NotificationSender implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userModel = null;
    protected $lateTime = null;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param float $late
     *
     * @return void
     */
    public function __construct(User $user, $lateMinutes)
    {
        $this->userModel = $user;
        $this->lateTime = Carbon::now()->addMinutes((int)ceil($lateMinutes));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::to($this->userModel)->send(new NotificationMail());
    }
}
