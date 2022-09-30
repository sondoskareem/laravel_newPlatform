<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CourseAsset extends Model
{

    protected $fillable = [
        'path',
        'is_deleted',
        'course_detail_id',


    ];
    protected $allowedFilters = [
        'is_deleted',
        'course_detail_id',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'is_deleted',
        'course_detail_id',
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
    
    public function getpathAttribute($path)
    {
        if ($path) {
            return asset('' . $path);
        } else {
            return '';
        }
    }
}
