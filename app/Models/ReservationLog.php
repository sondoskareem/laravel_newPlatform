<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class reservationLog extends Model
{
    protected $fillable = [
        'time',
        'start',
        'end',
        'duration',
        'comment',
        'is_deleted',
        'status',
        'user_id',
        'reservation_type_id',


    ];
    protected $allowedFilters = [
        'time',
        'start',
        'end',
        'duration',
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
        'time',
        'start',
        'end',
        'duration',
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
