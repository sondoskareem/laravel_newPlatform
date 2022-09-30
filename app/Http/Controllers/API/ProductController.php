<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\ProductRepository;
use App\Core\Helpers\Utilities;
use App\Models\Product;

class ProductController extends Controller
{
    private $ProductRepository;
    public function __construct()
    {
        $this->ProductRepository = new ProductRepository(new Product());
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

        return $this->ProductRepository->index($request->take, $request->skip, $where);
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
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'discount' => 'required|string',
            'quantity' => 'required|string',
            'category_id' => 'required|integer',
            'store_id' => 'required|integer',
            'point' => 'nullable|integer',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'Products');
        return $this->ProductRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->ProductRepository->show($id);
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
            'name' => 'string',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'store_id' => 'nullable|integer',
            'point' => 'nullable|integer',
            'discount' => 'string',
            'quantity' => 'string',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|nullable'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'Products');
        return $this->ProductRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->ProductRepository->destroy($id);
    }
}
