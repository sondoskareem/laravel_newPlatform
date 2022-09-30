<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\StoreRepository;
use App\Core\Helpers\Utilities;
use App\Models\Store;
class StoreController extends Controller
{
    private $StoreRepository;
    public function __construct()
    {
        $this->StoreRepository = new StoreRepository(new Store());
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

        return $this->StoreRepository->index($request->take, $request->skip, $where);
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
            'location' => 'required',
            'user_id' => 'required',
            'description' => 'nullable',
            'logo' => 'mimes:jpeg,bmp,png,jpg,svg|required'

        ]);
        if ($request->hasFile('logo'))
            $data['logo'] = Utilities::upload(request()->logo, 'Stores');
        return $this->StoreRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->StoreRepository->show($id);
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
            'location' => '',
            'description' => 'nullable',
            'logo' => 'mimes:jpeg,bmp,png,jpg,svg'

        ]);
        if ($request->hasFile('logo'))
            $data['logo'] = Utilities::upload(request()->logo, 'Stores');
        return $this->StoreRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->StoreRepository->destroy($id);
    }

    public function storesInInterest(Request $request)
    {
        return $this->StoreRepository->storesInInterest();
    }
}
