<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CrossNotif
 *
 * @property-read \App\Models\Data $data
 * @property-read \App\Models\Notification $notification
 * @mixin \Eloquent
 */
class CrossNotif extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "cross_notification";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "user_id", "data_id", "status"
    ];

    /**
     * The attributes assoc types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "user_id" => "integer",
        "data_id" => "integer",
        "status" => "boolean"
    ];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

    public function data()
    {
        return $this->belongsTo(Data::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
