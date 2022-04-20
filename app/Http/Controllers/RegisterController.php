<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Models\User;
class RegisterController extends Controller
{
    //

    public function index(){
        return view('register.index');
    }

    public function store(Request $request){
        $loginController = New UsersController;
        $request['tipe'] = 'Pengguna';
        $request['alamat'] = 'None';
        // dd($request);
        $validate = $loginController->validatePengguna($request);
        $input = $request->except('_token');
        // dd($input);
        // if($input['password'] != $input['confirm']){
        //     return back()->with('error','Kata Sandi tidak sesuai!!')->withInput();
        // }
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return redirect()->route('login.index')->with('success', 'Pendaftaran Berhasil, silahkan masuk gunakan akun yang anda daftarkan!!');


    }
}