<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{

    protected $fillable = [
        'name',
        'img',
        'is_deleted',
        'status',

    ];
    protected $allowedFilters = [
        'name',
        'is_deleted',
        'status',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
    ];

    public function Course()
    {
        return $this->hasMany(Course::class);
    }

    public function CourseCategory()
    {
        return $this->hasMany(CourseCategory::class);
    }
    public function users(){
        return $this->belongsToMany(User::class  ,'user_interest')
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
