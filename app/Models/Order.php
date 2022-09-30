<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{

    protected $fillable = [
        'total',
        'payment',
        'cart_id',
        'address_id',
        'is_deleted',
        'status',
        'client_id'

    ];
    protected $allowedFilters = [
        'total',
        'payment',
        'cart_id',
        'is_deleted',
        'status',
        'client_id'
    ];

    protected $allowedSorts = [
        'total',
        'payment',
        'cart_id',
        'client_id'
    ];

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Products(){

        return $this->belongsToMany(Product::class)
        ->withPivot('quantity' , 'price')
        ->withTimestamps();
    }
    
    
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Address()
    {
        return $this->belongsTo(Address::class ,'address_id');
    }
    
    
}
