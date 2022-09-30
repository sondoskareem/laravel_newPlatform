<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{

    protected $fillable = [
        'path',
        'media_type',
        'client_id',
        'is_deleted',
    ];
    protected $allowedFilters = [
        'id',
        'media_type',
        'client_id',
        'is_deleted',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'media_type',
        'id',
        'client_id',
        'is_deleted',
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
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
