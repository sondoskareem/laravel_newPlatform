<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CategoryRepository;
use App\Core\Helpers\Utilities;
use App\Models\Category;

class CategoryController extends Controller
{
    private $CategoryRepository;
    public function __construct()
    {
        $this->CategoryRepository = new CategoryRepository(new Category());
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

        return $this->CategoryRepository->index($request->take, $request->skip, $where);
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
            'parent_id' => 'integer|nullable',
            'store_id' => 'integer|required',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'Categories');
        return $this->CategoryRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->CategoryRepository->show($id);
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
            'name' => 'nullable|string',
            'status' => 'nullable',
            'parent_id' => 'integer|nullable',
            'store_id' => 'integer|nullable',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|nullable'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'Categories');
        return $this->CategoryRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CategoryRepository->destroy($id);
    }
}
