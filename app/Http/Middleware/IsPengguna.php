<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPengguna
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
        $getTipe = $request->session()->get('tipe');
        // dd($getTipe);
        if($getTipe == 'Pengguna'){
            return $next($request);
        }else{
            return redirect()->route('login.index')->with('error', 'Anda belum mempunyai akun, Silahkan mendaftar atau masuk menggunakan akun yang sudah terdaftar');
        }
        // return $next($request);
    }
}