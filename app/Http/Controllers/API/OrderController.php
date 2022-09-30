<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\OrderRepository;
use App\Core\Helpers\Utilities;
use App\Models\Order;

class OrderController extends Controller
{
    private $OrderRepository;
    public function __construct()
    {
        $this->OrderRepository = new OrderRepository(new Order());
    }

   
    public function index(Request $request)
    {
        $request->validate([
            'take' => 'integer',
            'skip' => 'integer',
        ]);
        if ($request->has('where')) {
            $where = json_decode($request->where, true);
        } else {
            $where = null;
        }

        return $this->OrderRepository->index($request->take, $request->skip, $where);
    }


    
    public function store(Request $request)
    {
        $data = $request->validate([
            // 'payment' => 'required|string',
            'address_id' => 'required|integer',
            'client_id' => 'required|exists:users,id',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|min:1',

        ]);

        return $this->OrderRepository->ProductOrder( $data , $request->products);
    }

    public function show($id)
    {
        return $this->OrderRepository->show($id);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'total' => 'nullable|string',
            'payment' => 'nullable|string',
            'cart_id' => 'nullable|integer',
            'address_id' => 'nullable|integer',
            'client_id' => 'nullable|integer',
            'status' => 'nullable',

        ]);

        return $this->OrderRepository->update($id, $data);
    }

   
    public function destroy($id)
    {
        return $this->OrderRepository->destroy($id);
    }
}
