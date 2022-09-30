<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    protected $fillable = [
        'name',
        'img',
        'parent_id',
        'is_deleted',
        'status',
        'store_id',
        'user_id',
        'type'

    ];
    protected $allowedFilters = [
        'name',
        'parent_id',
        'is_deleted',
        'status',
        'store_id'
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'parent_id',
        'store_id',
        'user_id',
        'type'
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function Products()
    {
        return $this->hasMany(Product::class);
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
