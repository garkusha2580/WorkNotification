<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Site
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Data[] $data
 * @mixin \Eloquent
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany(Data::class);
    }

    /**
     * @param array $data
     *
     */
    public static function add(array $data)
    {
        self::create($data);
    }

}
