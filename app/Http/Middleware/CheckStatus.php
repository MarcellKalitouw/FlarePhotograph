<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Notifikasi;

class CheckStatus
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
        // dd($next);
        // $notif = Notifikasi::all();
        // dd($notif);cls
        $getToken = $request->session()->get('email');
        // dd(session('email'));
        if($getToken){
            // dd('test');
            return $next($request);
        }else{
            // dd('tidak ada');

            return redirect()->route('login.index');

        }
        // return response()->json('Your account is inactive');
    }
}