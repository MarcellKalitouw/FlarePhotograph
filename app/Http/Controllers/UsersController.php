<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\User;

class UsersController extends Controller
{
   
    public function index()
    {
        $data = DB::table('users')->get();
        // dd($data);
        return view('users.index', compact('data'));
    }

  
    public function create()
    {
        return view('users.create', ['tipe' => 'pengguna']);
    }
    
    public function createAdmin(){
        return view('users.create', ['tipe' => 'admin']);

    }

    public function validatePengguna($r){
        $validate = $this->validate($r, [
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'no_hp' => 'required',
                'alamat' => 'required',
                'password' => 'required|min:8',
                'tipe' => 'required'

            ]);
        return $validate;
    }
    public function validateAdmin($r){
        $validate = $this->validate($r, [
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'tipe' => 'required'
            ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        if($request->tipe == 'pengguna'){
            $this->validatePengguna($request);
        }else{
            $this->validateAdmin($request);
        }
        

        $input = $request->except(['_token']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return redirect()->route('users.index')->with('create', '<strong> Users </strong>"'.$input['nama'].'" has created!!.');
    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $getData = DB::table ('users')->where('id', $id)->first();
        
        return view('users.edit', compact('getData'));
    }

    
    public function update(Request $request, $id)
    {
        // dd($request);
        $validate = $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required',

        ]);

        $input = $request->except(['_token', '_method']);
        // dd($input);
        $user = User::where('id', $id)->update($input);

        return redirect()->route('users.index');
    }

    
    public function destroy($id)
    {
        Users::where('id',$id)->delete();

        return redirect()->route('users.index');
    }
}