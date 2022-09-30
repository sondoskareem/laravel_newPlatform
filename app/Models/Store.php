<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Store extends Model
{

    protected $fillable = [
        'name',
        'logo',
        'location',
        'description',
        'user_id',
        'is_deleted',
    ];

    protected $allowedFilters = [
        'name',
        'location',
        'user_id',
        'is_deleted',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'id',
        'location',
        'user_id',
        'is_deleted',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function Category()
    {
        return $this->hasMany(Category::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
    
    public function getlogoAttribute($logo)
    {
        if ($logo) {
            return asset('' . $logo);
        } else {
            return '';
        }
    }
}
