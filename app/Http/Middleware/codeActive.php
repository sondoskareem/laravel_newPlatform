<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\License;
use Carbon\Carbon;

class codeActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (  Auth::guard('user-api')->user()->active == true) {

            $license = License::where('code' , Auth::guard('user-api')->user()->code)->first();

            $now = \Carbon\Carbon::now()->format('m/d/Y');
            $active_to = $license->expire->format('m/d/Y');

            $nowParsed=Carbon::parse($now);
            $active_toParsed=Carbon::parse($active_to);

            if( $nowParsed->gte($active_toParsed)){
                Auth::guard('user-api')->user()->update([
                    'active' => false
                ]);
                return response()->json(['error' => 'حسابك غير مفعل'], 401);
                
            }
            return $next($request);
       }
       return response()->json(['error' => 'حسابك غير مفعل'], 401);


    }
}
