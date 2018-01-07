<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "notification";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "email", "sites"
    ];

    /**
     * The attributes assoc types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "email" => "string",
        "sites" => 'string'
    ];

    public function crossNotif()
    {
        return $this->hasMany(CrossNotif::class);
    }
}
