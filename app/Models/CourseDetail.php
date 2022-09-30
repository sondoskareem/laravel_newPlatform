<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CourseDetail extends Model
{

    protected $fillable = [
        'title',
        'description',
        'img',
        'active',
        'video',
        'duration',
        'transcript',
        'is_deleted',
        'course_id',


    ];
    protected $allowedFilters = [
        'title',
        'is_deleted',
        'course_id',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'title',
        'video',
        'duration',
        'is_deleted',
        'course_id',
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function getvideoAttribute($video)
    {
        if ($video) {
            return asset('storage/' . $video);
        } else {
            return '';
        }
    }
}
