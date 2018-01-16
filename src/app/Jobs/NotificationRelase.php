<?php

namespace App\Jobs;

use App\Models\CrossNotif;
use App\Models\Data;
use App\Models\Notification;
use App\Models\Site;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotificationRelase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userEmail = null;

    /**
     * Create a new job instance.
     * @param $email
     * @return void
     */
    public function __construct($email)
    {
        $this->userEmail = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userId = User::where("email", "=", $this->userEmail)->first(["id"])->id;
        $sitesNames = Notification::where("email", "=", $this->userEmail)->get(["sites"]);
        $dataList = Data::whereHas("site", function ($query) use ($sitesNames) {
            $query->whereIn("name", $sitesNames);
        })
            ->get(["id as data_id"])
            ->map(function ($dataItem) use ($userId) {
                $dataItem["user_id"] = $userId;
                $dataItem["status"] = 0;
                CrossNotif::create($dataItem->toArray());
            });

    }
}
