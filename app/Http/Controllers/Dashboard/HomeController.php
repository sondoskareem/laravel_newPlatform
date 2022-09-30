<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Bills;
use App\Models\Section;
use App\Models\Category;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
// 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $Users = User::latest()->get();
        return view('index' ,[
            'Users'=>$Users
        ]);
       
    }


    
}
