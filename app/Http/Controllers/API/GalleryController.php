<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GalleryRepository;
use App\Core\Helpers\Utilities;
use App\Models\Gallery;

class GalleryController extends Controller
{
    private $GalleryRepository;
    public function __construct()
    {
        $this->GalleryRepository = new GalleryRepository(new Gallery());
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

        return $this->GalleryRepository->index($request->take, $request->skip, $where);
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
            'media_type' => 'required|string',
            'client_id' => 'required',
            'path' => 'mimes:jpeg,bmp,png,jpg,svg|required'
        ]);
        if ($request->hasFile('path'))
            $data['path'] = Utilities::upload(request()->path, 'Galleries');
        return $this->GalleryRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->GalleryRepository->show($id);
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
            'media_type' => 'required|string',
            'path' => 'mimes:jpeg,bmp,png,jpg,svg|required'
        ]);
        if ($request->hasFile('path'))
            $data['path'] = Utilities::upload(request()->path, 'Galleries');
        return $this->GalleryRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->GalleryRepository->destroy($id);
    }
}
