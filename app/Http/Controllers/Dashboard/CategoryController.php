<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Str;
use App\Traits\UploadTrait;
use URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct(){
        
    }

    public function index(Request $request){
        $Categories = Category::
        where('user_id', auth()->user()->id)
        ->where('type' , $request->type)
        ->latest()->paginate(8);
        
        return view('Category.index',[
            'Categories' => $Categories,
        ]);
    }
   
   

    public function create()
    {
        $Categories = Category::where('user_id', auth()->user()->id)->get();
        if(request()->ajax()){
            $data = new Category();
            return response()->json([
                'result' => $data ,
                'Categories' => $Categories ,
            ]);
        }

    }

    
    public function status(Request $request,$id)
    {
        $Category = Category::findOrfail($id);
        $Category->update(['status' => !$Category->status]);
        session()->flash('success' , __('success'));   
        return redirect(route('Category.index' , [ 'type' =>request()->type ] ));
    
    }

    public function store(CategoryRequest $request){

        $data = $request->all();

        if($request->img){

           $data['img'] = $request->img->store('category','public');

        }

        $data['store_id']= auth()->user()->Store->id;

        $data['user_id']= auth()->user()->id;

        $category = Category::create($data);

        session()->flash('success' , __('success'));   


        return  response()->json(['success' => __('success')]);
    }


    public function edit($id)
    {
        if(request()->ajax()){
            $data = Category::findOrFail($id);
            return response()->json(['result' => $data ]);
        }

    }
    public function update(Request $request)
    {

        $data = $request->all();
        $Category = Category::findOrFail($request->hidden_id);
        if($request->img){
            Storage::disk('public')->delete( Str::after($Category->img,'storage/')); 

           $data['img'] = $request->img->store('category','public');

        }

        $data['store_id']= auth()->user()->Store->id;
        
        $data['user_id']= auth()->user()->id;


            $Category->update($data);

            session()->flash('success' , __('success'));   
            return  response()->json(['success' => __('success')]);            

    }
    public function delete($id)

    {   
        $Category = Category::findOrfail($id);
            
        Storage::disk('public')->delete( Str::after($Category->photo,'storage/')); 

        Category::destroy($id);
        return redirect(route('Category.index' , ['id' => request()->section]));

    }


}
