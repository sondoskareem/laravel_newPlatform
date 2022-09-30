<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    //  protected $with = ['User'];
    
    protected $fillable = [
        'phone',
        'name',
        'points',
        'minutes',
        'img',
        'biography',
        'following',
        'followers',
        'time',
        'social_media',
        'is_consult',
        'user_id',
        'date',
        'is_deleted',
    ];
    protected $allowedFilters = [
        'name',
        'id',
        'phone',
        'social_media',
        'date',
        'user_id',
        'is_deleted',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'minutes',
        'following',
        'followers',
        'date',
        'time',
        'points',
        'user_id',
        'is_deleted',
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
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
