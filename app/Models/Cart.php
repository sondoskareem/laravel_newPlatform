<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{

    protected $fillable = [
        'notes',
        'client_id',
        'product_id',
        'is_deleted',
        'quantity',
        'store_id'

    ];
    protected $allowedFilters = [
        'notes',
        'client_id',
        'product_id',
        'is_deleted',
        'quantity',
        'store_id'
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'notes',
        'client_id',
        'product_id',
        'quantity',
        'store_id'
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }


    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
