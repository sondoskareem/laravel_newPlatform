<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'img',
        'discount',
        'quantity',
        'description',
        'is_deleted',
        'price',
        'store_id',
        'point',
        'category_id'

    ];
    protected $allowedFilters = [
        'name',
        'discount',
        'is_deleted',
        'price',
        'quantity',
        'category_id',
        'store_id'
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'price',
        'quantity',
        'store_id',
        'point',
        'category_id'
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos(){

        return $this->hasMany(photoProduct::class);

    }

    public function Orders(){
        return $this->belongsToMany(Order::class)  
        ->withPivot('quantity' , 'price')
        ->withTimestamps();
    }
    
    public function getimgAttribute($img)
    {
        if ($img) {
            return asset('' . $img);
        } else {
            return '';
        }
    }
}
