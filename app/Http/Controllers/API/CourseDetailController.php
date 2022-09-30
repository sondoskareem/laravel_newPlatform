<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CourseDetailRepository;
use App\Core\Helpers\Utilities;
use App\Models\CourseDetail;

class CourseDetailController extends Controller
{
    private $CourseDetailRepository;
    public function __construct()
    {
        $this->CourseDetailRepository = new CourseDetailRepository(new CourseDetail());
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

        return $this->CourseDetailRepository->index($request->take, $request->skip, $where);
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
            'title' => 'required|string',
            'duration' => 'required|string',
            'transcript' => 'string',
            'course_id' => 'required|integer',
            'video' => 'required|file'

        ]);
        if ($request->hasFile('video'))
            $data['video'] = Utilities::upload(request()->video, 'CourseDetails');
        return $this->CourseDetailRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->CourseDetailRepository->show($id);
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
            'title' => 'nullable|string',
            'duration' => 'nullable|string',
            'transcript' => 'string',
            'course_id' => 'nullable|integer',
            'video' => 'nullable'

        ]);
        if ($request->hasFile('video'))
            $data['video'] = Utilities::upload(request()->video, 'CourseDetails');
        return $this->CourseDetailRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CourseDetailRepository->destroy($id);
    }
}
