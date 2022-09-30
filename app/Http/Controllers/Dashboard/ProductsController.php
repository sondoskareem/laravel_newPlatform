<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Product;
use App\Models\photoProduct;
use Str;
use App\Traits\UploadTrait;
use URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;


class ProductsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('role:admin');
    }

    public function index(Request $request)
    {

        // try{
        $Products = Product::latest()->paginate(8);

        return view('Product.index', [
            'Products' => $Products,
        ]);

        // }catch (\Throwable $th) {


        // }
    }


    public function create(Request $request)
    {
        // try{
        $Products = new Product();
        $categories = Category::where('type', 'store')
            ->where('user_id', auth()->user()->id)
            ->get();
        $action = URL::route('Products.store');

        return view('Product.create', [
            'Products' => $Products,
            'categories' => $categories,
            'action' => $action,
        ]);
        // }catch (\Throwable $th) {


        // }

    }

    public function store(Request $request)
    {
        // try{
            // return $request->all();

        $this->validateRequest($request);

        $data = $request->all();
        $data['store_id'] = auth()->user()->Store->id;

        if ($request->img) {
            $data['img'] = $request->img->store('Course', 'public');
        }

        DB::beginTransaction();

            $product = Product::create($data);

            if($product && $request->photos){

                foreach($request->photos as $photo){

                    $DataPhoto[] = [

                        'product_id' => $product->id,
                        'photo' => $photo->store('product','public'),

                    ];
                }

                photoProduct::insert($DataPhoto);

            } 
            DB::commit();

        $Product = Product::create($data);

        return redirect(route('Products.index'))->with('message', 'success');
        // }catch (\Throwable $th) {


        // }
    }


    public function update(Request $request, $id)
    {
        // try{

        $Products = Product::findOrFail($id);
        $categories = Category::where('type', 'store')
            ->where('user_id', auth()->user()->id)
            ->get();
        $action = URL::route('Products.edit', $id);

        return view('Product.create', [
            'Products' => $Products,
            'categories' => $categories,
            'action' => $action,
        ]);
        // }catch (\Throwable $th) {


        // }
    }

    public function edit(Request $request)
    {

        // try{

        $this->validateRequest($request, 'sometimes|');

        $data = $request->except('password');

        if ($request->img) {
            $data['img'] = $request->img->store('Product', 'public');
        }

        $Product = Product::findOrfail($request->id);

        $Product->update($data);

        return redirect(route('Products.index'))->with('message', 'success ');

        // }catch (\Throwable $th) {


        // }

    }


    public function delete(Request $request, $id)
    {
        $Product = Product::findOrfail($id);
        Product::destroy($id);
        Storage::disk('public')->delete( Str::after($Product->img,'storage/'));
        return redirect(route('Products.index'))->with('message', 'success ');
    }

    protected function validateRequest($request, $options = '')
    {
        return $this->validate($request, [
            'name' => $options . "required|string|min:4",
            'price' => $options . "required|string",
            'description' => $options . "required|string",
            'category_id' => 'required|exists:categories,id',
        ]);
    }

}
