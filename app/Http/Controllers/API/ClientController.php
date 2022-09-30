<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repositories\ClientRepository;
use App\Http\Repositories\UserRepository;
use App\Core\Helpers\Utilities;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ClientController extends Controller
{
    private $ClientRepository;
    private $UserRepository;
    public function __construct()
    {
        $this->ClientRepository = new ClientRepository(new Client());
        $this->UserRepository = new UserRepository(new User());
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

        return $this->ClientRepository->index($request->take, $request->skip, $where);
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
            'phone' => 'string',
            'points' => 'string',
            'minutes' => 'string',
            'biography' => 'nullable',
            'following' => 'string',
            'followers' => 'string',
            'time' => 'nullable',
            'social_media' => 'nullable',
            'date' => 'nullable',
            'is_consult' => 'nullable',
            'user_id' => 'required',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('img'))
            $data['img'] = Utilities::upload(request()->img, 'Clients');
        return $this->ClientRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->ClientRepository->show($id);
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
          $this->validateRequest($request );
        
        $user = $request->only('phone' , 'email' , 'name');
        $client = $request->only('biography'   , 'img');
        
        if($request->password){
             $user['password'] = Hash::make($request->password);
        }
        
       
        if ($request->hasFile('img')){
            $data['img'] = Utilities::upload(request()->img, 'Clients');
        }
            
         $this->ClientRepository->update($request->client_id, $client);
        return $this->UserRepository->update($request->user_id, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->ClientRepository->destroy($id);
    }
    
    protected function validateRequest( $request){
        return $this->validate($request,[
            'phone' => 'string|nullable',
            'biography' => 'string|nullable',
            'img' => 'mimes:jpeg,bmp,png,jpg,svg|nullable',
            'name' => 'string|nullable',
            'email' => 'string|nullable',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',

        ]);

    }

}
