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
use Carbon\Carbon;
trait checkLicense
{
    public function checkDriverLicense($drivers){

        $data = [];
       
        foreach ($drivers as $item) {
            $License = License::where('code' , $item->code)->first();

            $now = \Carbon\Carbon::now()->format('m/d/Y');
            $active_to = $License->expire->format('m/d/Y');
          //   Log::info($License->expire->format('m/d/Y'));
  
            $nowParsed=Carbon::parse($now);
            $active_toParsed=Carbon::parse($active_to);
  
            //gte
            if( $nowParsed->lte($active_toParsed)){


                array_push($data ,$item);
            }
        }
        return $data ;

    }
}