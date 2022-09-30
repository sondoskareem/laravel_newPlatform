<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Permission;
use App\Models\CourseDetail;
use Str;
use App\Traits\UploadTrait;
use URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class CourseDetailController extends Controller
{

    public function __construct()
    {
        // $this->middleware('role:admin');

    }

    public function index(Request $request, $id)
    {

        // try{

        $CourseDetails = CourseDetail::where('course_id', $id)->latest()->paginate(20);
        $Course = Course::findOrFail($id);
        return view('CourseDetail.index', [
            'CourseDetails' => $CourseDetails,
            'id' => $Course->User->id
        ]);

        // }catch (\Throwable $th) {


        // }
    }

    public function create()
    {
        // try{
        $CourseDetail = new CourseDetail();
        $action  = URL::route('video.store');

        return view('CourseDetail.create', [
            'CourseDetail' => $CourseDetail,
            'course_id' => request()->course_id,
            'action' => $action
        ]);
        // }catch (\Throwable $th) {


        // }

    }

    public function uploadLargeFiles(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $path = $file->store('videos', 'public');

            $CourseDetail = CourseDetail::create([
                'video' => $path,
                'course_id' => $request->course_id,
            ]);
            // delete chunked file
            unlink($file->getPathname());
            // return [
            //     'path' => asset('storage/' . $path),
            //     'filename' => $path
            // ];
        }

        // otherwise return percentage informatoin
        // $handler = $fileReceived->handler();
        // return [
        //     'done' => $handler->getPercentageDone(),
        //     'status' => true
        // ];
    }
    public function upload1LargeFiles(Request $request)
    {

        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            session()->flash('error', __('dashboard.error'));
        }

        $fileReceived = $receiver->receive();
        if ($fileReceived->isFinished()) {
            $file = $fileReceived->getFile();
            $path = $file->store('videos', 'public');
            

            unlink($file->getPathname());
           

            return [
                'path' => asset('storage' . $path),
                'filename' => $path
            ];

        }
        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();

        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];


    }

    public function update(Request $request, $id)
    {
        // try{
        $CourseDetail = CourseDetail::findOrFail($id);
        $action  = URL::route('video.edit', $id);

        return view('CourseDetail.create', [
            'CourseDetail' => $CourseDetail,
            'course_id' => request()->course_id,
            'action' => $action
        ]);
        // }catch (\Throwable $th) {
        // }

    }



    public function edit(Request $request, $id)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            session()->flash('error', __('dashboard.error'));
        }

        $fileReceived = $receiver->receive();
        if ($fileReceived->isFinished()) {
            $file = $fileReceived->getFile();
            $path = $file->store('videos', 'public');

            $CourseDetail = CourseDetail::findOrFail($id);
            Storage::disk('public')->delete(Str::after($CourseDetail->video, 'storage/'));
            $CourseDetail->update(['video' => $path]);

            unlink($file->getPathname());
            return redirect(route('Coaches.index'))->with('message', 'success');

            return [
                'path' => asset('storage' . $path),
                'filename' => 'file uploaded'
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        session()->flash('success', __('dashboard.success'));
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function detailsCreate($id)
    {
        // try{
            $CourseDetail = CourseDetail::findOrFail($id);
            $action  = URL::route('CourseDetail.details.store' , $id);

        return view('CourseDetail.details', [
            'CourseDetail' => $CourseDetail,
            'course_id' => request()->course_id,
            'action' => $action
        ]);
        // }catch (\Throwable $th) {


        // }

    }

    
    public function detailsStore(Request $request)
    {

    // try{

        $this->validateRequest($request, 'sometimes|');
        
        $data = $request->all();


        if($request->img){
            $data['img'] = $request->img->store('CourseDetail','public');
        }
        
        if($request->active == 'on'){
            $data['active'] = 1;
        }

        $CourseDetail = CourseDetail::findOrfail($request->id);
    
        $CourseDetail = tap($CourseDetail)->update($data);

        session()->flash('success' , __('dashboard.success'));   

        return redirect(route('CourseDetail.index',$CourseDetail->course_id))->with('message', ' success ');
        
    // }catch (\Throwable $th) {

                
    // }

    }
    public function delete(Request $request, $id)
    {
        $CourseDetail = CourseDetail::findOrFail($id);
        Storage::disk('public')->delete( Str::after($CourseDetail->img,'storage/'));
        CourseDetail::destroy($id);
        return redirect(route('CourseDetail.index',$CourseDetail->course_id))->with('message', ' success ');
    }

    protected function validateRequest($request, $options = '')
    {
        return $this->validate($request, [
            'title' => $options . "required|string",
            'duration' => $options . "required|string",
            'img' => $options . "required|mimes:jpeg,bmp,png,jpg,svg",
            'description' => $options . "required|string",
        ]);
    }

}
