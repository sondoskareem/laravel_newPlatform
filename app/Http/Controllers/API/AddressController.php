<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Repositories\AddressRepository;
use App\Core\Helpers\Utilities;
use App\Models\Address;
class AddressController extends Controller
{
    private $AddressRepository;
    public function __construct()
    {
        $this->AddressRepository = new AddressRepository(new Address());
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

        return $this->AddressRepository->index($request->take, $request->skip, $where);
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
            'country' => 'required|string',
            'address' => 'required|string',
            'street' => 'string|nullable',
            'building' => 'string|nullable',
            'floor' => 'string|nullable',
            'user_id' => 'required|integer',
            'latitude' => 'string|nullable',
            'longitude' => 'string|nullable',
        ]);
        return $this->AddressRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->AddressRepository->show($id);
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
            'country' => 'required|string',
            'address' => 'required|string',
            'street' => 'string|nullable',
            'building' => 'string|nullable',
            'floor' => 'string|nullable',
            'latitude' => 'string|nullable',
            'longitude' => 'string|nullable',
            'user_id' => 'nullable|integer',

        ]);
        return $this->AddressRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->AddressRepository->destroy($id);
    }

}
