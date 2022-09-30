<?php

namespace App\Exports;

use App\Models\License;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
class LicenseExport  implements FromArray
{
    protected  $group_id ;
    function __construct($group_id) {
        $this->group_id = $group_id;
       
    }


    // public function collection()
    // {
    //         $records = DB::table('licenses')

    //         ->select( 'code')
    //         ->where('group_id' , $this->group_id)
    //         ->orderBy('id', 'asc') 
    //         ->get()
    //         ->toArray();
      
    
    //     return collect($records);
    // }
  




    public function array(): array
    {
        $records = DB::table('licenses')

                ->select( 'code')
                ->where('group_id' , $this->group_id)
                ->orderBy('id', 'asc') 
                ->get()
                ->toArray()
                ;
       

       return  $records;
        
    }
}
