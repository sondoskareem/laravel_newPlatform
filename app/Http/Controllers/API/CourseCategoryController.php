<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CourseCategoryRepository;
use App\Core\Helpers\Utilities;
use App\Models\CourseCategory;

class CourseCategoryController extends Controller
{
    private $CourseCategoryRepository;
    public function __construct()
    {
        $this->CourseCategoryRepository = new CourseCategoryRepository(new CourseCategory());
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

        return $this->CourseCategoryRepository->index($request->take, $request->skip, $where);
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
            'course_topic_id' => 'integer|required',
            'user_id' => 'integer|required',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'CourseCategories');
        return $this->CourseCategoryRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->CourseCategoryRepository->show($id);
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
            'course_topic_id' => 'integer',
            'user_id' => 'integer',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|nullable'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'CourseCategories');
        return $this->CourseCategoryRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CourseCategoryRepository->destroy($id);
    }
}
