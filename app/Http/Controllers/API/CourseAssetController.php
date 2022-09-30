<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CourseAssetRepository;
use App\Core\Helpers\Utilities;
use App\Models\CourseAsset;

class CourseAssetController extends Controller
{
    private $CourseAssetRepository;
    public function __construct()
    {
        $this->CourseAssetRepository = new CourseAssetRepository(new CourseAsset());
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

        return $this->CourseAssetRepository->index($request->take, $request->skip, $where);
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
            'course_detail_id' => 'required|integer',
            'path' => 'file|required'

        ]);
        if ($request->hasFile('path'))
            $data['path'] = Utilities::upload(request()->path, 'CourseAssets');
        return $this->CourseAssetRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->CourseAssetRepository->show($id);
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
            'course_detail_id' => 'integer',
            'path' => 'file'

        ]);
        if ($request->hasFile('path'))
            $data['path'] = Utilities::upload(request()->path, 'CourseAssets');
        return $this->CourseAssetRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CourseAssetRepository->destroy($id);
    }
}
