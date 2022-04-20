<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login.index');
    }
    public function validate_users(){
        $token = session('email');
        // dd($token);
        if($token == null){
            return false;
            // header("Location: http://127.0.0.1:8001/login");
            // exit();
            // redirect()->route('login.index');
            // dd('test');
        }else{
            return true;
        }
    }
    
    public function create()
    {
        //
    }

    public function store(Request $r)
    {
        $validate = $this->validate($r, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if($validate){
            $user = User::where('email', $r->email)->first();
            // dd($user);
            if($user && Hash::check($r->password, $user->password) ){
                if ($user->tipe == 'Admin') {
                    
                    $s = session([
                        'id_user' => $user->id,
                        'email' => $user->email,
                        'nama' => $user->nama,
                        'tipe' => $user->tipe
                    ]);
                    // dd(session()->all());
                    return redirect()->route('produk.index')->with('success', '<b>Login Admin Berhasil</b>');
                }else{
                    session([
                        'email' => $user->email,
                        'id_user' => $user->id,
                        'nama' => $user->nama,
                        'tipe' => $user->tipe
                    ]);
                    return redirect()->route('landingPage.index')->with('success', '<b>Login Pengguna Berhasil</b>');
                }
                
            }
            else{
                session()->flush();
                return redirect()->route('login.index')->with('error', 'Email atau Password anda Salah!!');
            }
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->route('login.index');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}