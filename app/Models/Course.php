<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name',
        'img',
        'description',
        'is_deleted',
        'price',
        'point',
        'category_id',
        'user_id',


    ];
    protected $allowedFilters = [
        'name',
        'discount',
        'is_deleted',
        'price',
        'category_id'
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'img',
        'price',
        'category_id'
    ];

    public function CourseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function CourseDetail()
    {
        return $this->hasMany(CourseDetail::class);
    }
    

    public function getImgAttribute($img)
    {
        if ($img) {
            return asset('public/storage/'. $img);
        } else {
            return '';
        }
    }
}
