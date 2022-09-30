<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CourseCategory extends Model
{

    protected $fillable = [
        'name',
        'img',
        'parent_id',
        'user_id',
        'is_deleted',
        'status',
        'course_topic_id'

    ];
    protected $allowedFilters = [
        'name',
        'parent_id',
        'is_deleted',
        'status',
        'course_topic_id'
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'parent_id',
        'course_topic_id'
    ];

    public function CourseTopic()
    {
        return $this->belongsTo(CourseTopic::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
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
