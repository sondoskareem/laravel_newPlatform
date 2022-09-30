<?php

namespace App\Http\Controllers\Dashboard;

use Storage;
use App\Models\Order;
use App\Models\Piece;
use App\Models\Product;
use App\Models\Currency;
use LaravelLocalization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRquest;
use App\Models\User;

class OrderController extends Controller
{   
    public function __construct(){
        
        // $this->middleware('permission:orders-read')->only(['index']);
        // $this->middleware('permission:orders-delete')->only(['delete']);
       
        
    }

    public function index(Request $request){

         $orders = Order::

            where('client_id' , auth()->user()->id)

            ->when($request->search , function($query) use($request){

                return $query->where('id',$request->search);

                   
            })
            ->with('Address')
            ->latest()->paginate(10);
            return view('Order.index',[

                'orders' => $orders, 
            ]);

    }//end function index


    public function show(Order $id){

        return view('Order.show',[
            'order' => $id,
        ]);

    }

    
    public function delete($id){

        try{

            $order = Order::findOrfail($id);

            if($order->productOrder->count() > 0){

                foreach($order->productOrder as $product){

                    if($product->photo){
                    
                        $path = Str::after($product->photo,'storage/');

                        Storage::disk('public')->delete($path); 
                
                    }

                }//end foreach

            }//end if

        
            $order->delete();

            session()->flash('success',__('dashboard.deleted successfully'));

            return redirect(route('dashboard.order.index'));


        } catch (\Throwable $th) {

            session()->flash('error_ex', __('dashboard.error_ex'));

            return redirect(route('dashboard.order.index')); 
           
        }

    }//end delete
   


   public function status(StatusRquest $request){

       $order = Order::findOrfail($request->order_id);

       $data = $request->only('status');

        if($request->message){

           $data['message'] = $request->message;
           
        }

        $order->update($data);
        
        if($order->status == 'order is rejected'){

            foreach($order->productOrder as $productOrder){
                
                if($productOrder->product_id &&  isset($productOrder->product->quantity)){
                
                    $quantity =  $productOrder->product->quantity + $productOrder->quantity;

                    $productOrder->product->quantity  =   $quantity;

                    $productOrder->product->save();
                
                }

               
                if($productOrder->piece_id){
                    
                    $piece =  Piece::find($productOrder->piece_id);
                    
                    if($piece){

                        $piece->quantity =  $piece->quantity +  $productOrder->quantity ;

                        $piece->save();

                    }
                }
            } 
        }    
        
        if(isset($order->user->id)){

            $this->send($order,$order->user);
        }

        session()->flash('success' , __('dashboard.updated successfully')); 

        return redirect()->back();
   }



    public $item;

    public $user;

    

    public function sendMessage() {

        $heading  = array(

            "en" => str_replace('_',' ',env('ONESIGNAL_APP_NAME_EN')) ,
            "ar" => str_replace('_',' ',env('ONESIGNAL_APP_NAME_AR')) ,
        );
        
        $ar = "";
       if($this->item->status == "pending"){
           $ar = "قيد ألانتضار";
       }elseif($this->item->status == "processing order"){
           $ar = "معالجة الطلب";
       }elseif($this->item->status =="delivering order"){
           $ar = "توصيل الطلب";
       }elseif($this->item->status =="delivered"){
           $ar = "تم التوصيل";
       }elseif($this->item->status =="order is rejected"){
           $ar = "تم رفض الطلب";
       }

        
        $content  = array(
            
            "en" => $this->item->status,
            "ar" => $ar,
        );

       

        $photo = $this->item->photo;
   
        $fields = array(
            
            'app_id' => env('ONESIGNAL_ID'),
            'include_player_ids' => array($this->user->onesignal),
            'large_icon' =>'ic_stat_onesignal_default',
            'small_icon' => 'ic_stat_onesignal_default',
            'android_accent_color'=>env('ONESIGNAL_COLOR'),
            'contents' => $content,
            'headings' => $heading,
            'data' => array("index"=> 4),
           
        );
    
        $fields = json_encode($fields);
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.env('ONESIGNAL_KEY')
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }//sendMessage function



    public function send($item,$user){

        $this->item = $item;
        
        $this->user = $user;

        $response = $this->sendMessage();

    }   









}
