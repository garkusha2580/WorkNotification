<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "sites";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "home_url"
    ];

    /**
     * The attributes assoc types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "name" => "string",
        "home_url" => 'string'
    ];

    function data()
    {
        return $this->hasMany(Data::class);
    }
}
