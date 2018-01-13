<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Notification
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CrossNotif[] $crossNotif
 * @mixin \Eloquent
 */
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

    public static function add(array $postParams)
    {
        $sites = $postParams["sites"];
        $sitesNames = Site::whereIn("home_url", $sites)->get(["name"])->toArray();

        self::create([
            "email" => $postParams["email"],
            "sites" => implode("|", array_pluck($sitesNames, "name"))
        ]);
    }

    public function crossNotif()
    {
        return $this->hasMany(CrossNotif::class);
    }
}
