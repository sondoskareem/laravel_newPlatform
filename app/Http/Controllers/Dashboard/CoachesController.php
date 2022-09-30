<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Str;
use App\Traits\UploadTrait;
use URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CoachesController extends Controller
{

    public function __construct(){
        // $this->middleware('role:admin');

    }

    public function index(Request $request ){



        $Coaches = User::where('type','=', 'Client')->get();

        return view('Coaches.index',[
            'Coaches' => $Coaches,
        ]);

    }

    public function create(){
    // try{

        $Coaches = new User();
        $permissions = Permission::all();
        $action = URL::route('Employees.store');

        return view('Coaches.create')->with(compact('permissions','Coaches', 'action'));
    // }catch (\Throwable $th) {


    // }

    }


    public function store(Request $request){
    // try{

        $this->validateRequest($request);
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $data['type'] = 'employee';
        $Employees = User::create($data);


        session()->flash('success' , __('dashboard.updated successfully'));

        return redirect(route('Employees.index',['type' => $request->type]))->with('message', 'The success message!');
    // }catch (\Throwable $th) {


    // }
    }


    public function update(Request $request,$id)
    {
    // try{

        $Coaches = User::findOrfail($id);
        $action = URL::route('Coaches.edit', ['id' => $id , 'type'=>$request->type]);
        $permissions = Permission::all();

        return view('Coaches.create',['type' => $request->type])->with(compact('Coaches','permissions', 'action'));
    // }catch (\Throwable $th) {


    // }
    }

    public function edit(Request $request)
    {

    // try{

        $this->updateValidateRequest($request, 'sometimes|');

        $data = $request->except('password');

        if($request->password){

            $data['password']= Hash::make($request['password']);
        }

        $Employees = User::findOrfail($request->id);

        $Employees->update($data);

        if($request->permission){

            $Employees->attachPermissions($request->permission);

        }

        session()->flash('success', __('dashboard.success'));

        return redirect(route('Coaches.index' ,['type' => $request->type]));

    // }catch (\Throwable $th) {


    // }

    }


    public function delete(Request $request , $id)
    {
        User::destroy($id);
        return redirect(route('Coaches.index',['type' => $request->type]));
    }

  protected function validateRequest( $request, $options = ''  ){
        return $this->validate($request,[
            'name' => $options."required|string|min:4|unique:users",
            'email' => $options."required|string|min:6|unique:users",
            'password' => $options."required|string|min:6|confirmed",
        ]);

    }

    protected function updateValidateRequest( $request, $options = ''  ){
        return $this->validate($request,[
            'email' => $options.'required|unique:users,email,'.$request->id,
            'name' => $options.'required|unique:users,name,'.$request->id,
        ]);
    }
}
