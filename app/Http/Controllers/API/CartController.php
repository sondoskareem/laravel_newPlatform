<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CartRepository;
use App\Core\Helpers\Utilities;
use App\Models\Cart;

class CartController extends Controller
{
    private $CartRepository;
    public function __construct()
    {
        $this->CartRepository = new CartRepository(new Cart());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return $this->CartRepository->index($request->take, $request->skip, $where);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'notes' => 'nullable',
            'client_id' => 'required|integer',
            'product_id' => 'integer|required',
            'quantity' => 'integer|required',
            'store_id' => 'integer|required',

        ]);
        return $this->CartRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->CartRepository->show($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'notes' => 'nullable',
            'client_id' => 'nullable|integer',
            'product_id' => 'integer|nullable',
            'quantity' => 'integer|nullable',
            'store_id' => 'integer|nullable',
        ]);
        return $this->CartRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CartRepository->destroy($id);
    }
}
