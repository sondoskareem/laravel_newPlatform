<?php
namespace App\Http\Repositories;
use g4t\Pattern\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
class OrderRepository extends BaseRepository {

    public function ProductOrder($order ,$products)
    {
        $user =  auth('api')->user();
        $order = $user->orders()->create($order);

        foreach($products as $product){

            $order->Products()->attach($product['product_id'] , [
                'quantity'=>$product['quantity'],
                'price'=>$product['price']
            ]);

            
            $productDB = Product::findOrFail($product['product_id']);
            $productDB->quantity = $productDB->quantity - $product['quantity'];
            $productDB->save();
        }
       
        $response = [
            'message' => 'Order Created',
            'code' => 200,
            'id' => $order->id
        ];
        
        return $response ;
    }
}