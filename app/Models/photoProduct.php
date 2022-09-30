<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photoProduct extends Model
{
    protected $table = 'photo_products';

    protected $fillable = ['photo' , 'prudect_id'];
    

    public function getPhotoAttribute($photo){
        
       return asset('public/storage/'. $photo);

    }   



    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
