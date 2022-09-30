<?php

namespace App\Traits;

use Illuminate\Support\Stgr;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Driver;
use App\Models\User;
use App\Models\License;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

trait getPrice
{
    public function getPriceOfTowPoints($data , $lat1 , $long1 , $price){


        $lat2=$data->lat;
        $long2=$data->long;


        $longi1 = deg2rad($long1); 
        $longi2 = deg2rad($long2); 
        $lati1 = deg2rad($lat1); 
        $lati2 = deg2rad($lat2); 

        
         $difflong = $longi2 - $longi1; 
         $difflat = $lati2 - $lati1;

         $val = pow(sin($difflat/2),2)+cos($lati1)*cos($lati2)*pow(sin($difflong/2),2); 
              
        $res1 =3936* (2 * asin(sqrt($val))); //for miles
        $distance =6378.8 * (2 * asin(sqrt($val))); //for kilometers


         $floatPrice = $distance * $price;
         $price = number_format((float)$floatPrice, 2, '.', '');
         return $price;
       

    }
}