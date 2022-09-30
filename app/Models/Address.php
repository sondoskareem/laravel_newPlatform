<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{

    protected $fillable = [
        'country',
        'address',
        'street',
        'building',
        'floor',
        'latitude',
        'longitude',
        'is_deleted',
        'user_id',
    ];
    protected $allowedFilters = [
        'id',
        'country',
        'address',
        'street',
        'building',
        'floor',
        'latitude',
        'longitude',
        'user_id',
        'is_deleted',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'country',
        'user_id',
        'is_deleted',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}
