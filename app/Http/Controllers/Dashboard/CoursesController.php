<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Permission;
use Str;
use App\Traits\UploadTrait;
use URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Storage;

class CoursesController extends Controller
{

    public function __construct()
    {
        // $this->middleware('role:admin');

    }

    public function index(Request $request, $id)
    {

        // try{
        $Courses = Course::latest()->paginate(8);

        return view('Courses.index', [
            'Courses' => $Courses,
        ]);

        // }catch (\Throwable $th) {


        // }
    }


    public function create(Request $request)
    {
        // try{
        $Courses = new Course();
        $categories = Category::where('type', 'course')
            ->where('user_id', auth()->user()->id)
            ->get();
        $action = URL::route('Courses.store');

        return view('Courses.create', [
            'Courses' => $Courses,
            'categories' => $categories,
            'action' => $action,
        ]);
        // }catch (\Throwable $th) {


        // }

    }

    public function store(Request $request)
    {
        // try{

        $this->validateRequest($request);

        $data = $request->all();
        // return $data;
        $data['user_id'] = auth()->user()->id;

        if ($request->img) {
            $data['img'] = $request->img->store('Course', 'public');
        }

        $Course = Course::create($data);


        session()->flash('success', __('dashboard.success'));

        return redirect(route('Courses.index', $Course->user_id))->with('message', 'The success message!');
        // }catch (\Throwable $th) {


        // }
    }


    public function update(Request $request, $id)
    {
        // try{

        $Courses = Course::findOrFail($id);
        $categories = Category::where('type', 'course')
            ->where('user_id', auth()->user()->id)
            ->get();
        $action = URL::route('Courses.edit', $id);

        return view('Courses.create', [
            'Courses' => $Courses,
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
            $data['img'] = $request->img->store('Course', 'public');
        }

        $Course = Course::findOrfail($request->id);

        $Course->update($data);

        session()->flash('success', __('dashboard.success'));

        return redirect(route('Courses.index', $Course->user_id))->with('message', 'The success message!');

        // }catch (\Throwable $th) {


        // }

    }


    public function delete(Request $request, $id)
    {
        User::destroy($id);
        return redirect(route('Coaches.index', ['type' => $request->type]));
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

    protected function updateValidateRequest($request, $options = '')
    {
        return $this->validate($request, [
            'email' => $options . 'required,email,' . $request->id,
            'name' => $options . 'required,name,' . $request->id,
        ]);
    }
}
