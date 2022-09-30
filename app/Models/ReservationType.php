<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ReservationType extends Model
{

    protected $fillable = [
        'name',
    ];
    protected $allowedFilters = [
        'name',

    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',

    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
}
