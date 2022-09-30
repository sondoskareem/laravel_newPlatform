<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{

    protected $fillable = [
        'title',
        'img',
        'duration',
        'noc',
        'pricing',
        'description',
        'is_deleted',
        'status',
        'user_id',
        'reservation_type_id',


    ];
    protected $allowedFilters = [
        'title',
        'noc',
        'pricing',
        'is_deleted',
        'status',
        'user_id',
        'reservation_type_id',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'title',
        'duration',
        'noc',
        'pricing',
        'is_deleted',
        'status',
        'user_id',
        'reservation_type_id',
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
}
