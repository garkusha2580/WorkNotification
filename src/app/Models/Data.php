<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Data
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CrossNotif[] $crossNotif
 * @property-read \App\Models\Site $site
 * @mixin \Eloquent
 */
class Data extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "data";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "site_id", "name", "body", "keyword", "city"
    ];

    /**
     * The attributes assoc types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "site_id" => "integer",
        "name" => 'string',
        "body" => "string",
        "keyword" => "string",
        "city" => "string"
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function crossNotif()
    {
        return $this->hasMany(CrossNotif::class);
    }
}
