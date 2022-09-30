<?php

namespace App\Exports;

use App\Invoice;
use App\Model\card;
use  Maatwebsite\Excel\Concerns\FromArray;

class ExportProduct implements FromArray
{

    public $orders ;

    public function __construct($orders){

        $this->orders = $orders;
        
    }

    public function array(): array
    {
       
        $i= 0;
        
      
        foreach($this->orders as $product){
            
                    $orderArray[$i][] = $i+1;

                    $orderArray[$i][] = $product->code;

                    $orderArray[$i][] = $product->name_ar;
                    

            ++$i;

        }

        //dd($MainArray);

       return  $orderArray;
        
    }



}