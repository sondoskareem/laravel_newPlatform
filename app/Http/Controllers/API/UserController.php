<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\ClientTypeRepository;
use App\Core\Helpers\Utilities;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private $UserRepository;
    private $ClientTypeRepository;
    public function __construct()
    {
        $this->UserRepository = new UserRepository(new User());
        $this->ClientTypeRepository = new ClientTypeRepository(new Client());
        $this->middleware('auth:api', ['only' => ['interest' , 'interestIndex' , 'follow' ,'unfollow' ]]);
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
        if($request->has('where')) {
            $where = json_decode($request->where, true);
        } else {
            $where = null;
        }
         if($request->has('wheres')) {
            $wheres = json_decode($request->wheres, true);
            // return $request->wheres;
        } else {
            $wheres = null;
        }

        return $this->UserRepository->index($request->take, $request->skip, $where ,$wheres);
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
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:4|max:10',
            'apple_id' => 'string|nullable|unique:user',
            'google_id' => 'string|nullable|unique:users',
            'type' => 'string|nullable',
        ]);
        $data['password'] = Hash::make($request['password']);
        $userID = $this->UserRepository->store($data);
        // return $userID;
        return $this->ClientTypeRepository->store(['user_id' => $userID ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->UserRepository->show($id);
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
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:4|max:10',
        ]);
        return $this->UserRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->UserRepository->destroy($id);
    }
    
    public function interest(Request $request){
       return $this->UserRepository->interest(json_decode($request->ids , true));

    }

    public function interestIndex(Request $request){
        return $this->UserRepository->interestIndex();

    }

  
    public function follow(Request $request){
        $this->validateRequest($request);
        return $this->UserRepository->follow($request->user_id);

    }
    public function unfollow(Request $request){
        $this->validateRequest($request);
        return $this->UserRepository->unfollow($request->user_id);

    }
    public function followers(Request $request){
        $this->validateRequest($request);
        return $this->UserRepository->followers($request->user_id);

    }
    public function following(Request $request){
        $this->validateRequest($request);
        return $this->UserRepository->following($request->user_id);

    }

    protected function validateRequest( $request, $options = ''  ){
        return $this->validate($request,[
            'user_id' => "required|exists:users,id", 
        ]);

    }

    
}
