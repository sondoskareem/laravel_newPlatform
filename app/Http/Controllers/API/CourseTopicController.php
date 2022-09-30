<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CourseTopicRepository;
use App\Core\Helpers\Utilities;
use App\Models\CourseTopic;

class CourseTopicController extends Controller
{
    private $CourseTopicRepository;
    public function __construct()
    {
        $this->CourseTopicRepository = new CourseTopicRepository(new CourseTopic());
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

        return $this->CourseTopicRepository->index($request->take, $request->skip, $where);
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
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'CourseTopics');
        return $this->CourseTopicRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->CourseTopicRepository->show($id);
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
            'status' => 'nullable',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'CourseTopics');
        return $this->CourseTopicRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->CourseTopicRepository->destroy($id);
    }
}
