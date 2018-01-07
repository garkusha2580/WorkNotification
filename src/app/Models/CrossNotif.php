<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrossNotif extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "cross_notif";


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
}
