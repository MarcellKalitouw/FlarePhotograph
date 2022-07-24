<?php

namespace App\Http\Controllers;

use App\Models\ProfileUsaha;
use App\Models\BankTransfer;
use Illuminate\Http\Request;

class ProfileUsahaController extends Controller
{
    public function validationProfile($data){
        // dd($data);
        $data->validate([
            'nama_usaha' => 'required',
            'deskripsi_usaha' => 'required',
            'alamat_lengkap' => 'required'
        ]);
    }
    public function validationAlamat($data){
        $data->validate([
            'long' => 'required',
            'lat' => 'required',
            
        ]);
        
    }
    
    public function index()
    {
        $bank_transfer = BankTransfer::get();
        $data = ProfileUsaha::where('id', 1)->first();
        // dd($data);
        return view('profile_usaha.index', compact('bank_transfer','data'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        dd($request);
        $this->validationProfile($request);
        $input = $request->except(['_token']);
        if($request->hasfile('gambar_usaha')){
            $fileName = time().'_'.$input['gambar_usaha']->getClientOriginalName();
            $input['gambar_usaha']->move(public_path('gambar_usaha'), $fileName);
            $input['gambar_usaha'] = $fileName;
        }
        $profile = ProfileUsaha::create($input);
        return redirect()->route('profile_usaha.index');
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
        $validation = $this->validationProfile($request);
        // dd($validation);
        $oldData = ProfileUsaha::find($id);
        $input = $request->except(['_token', '_method']);
        if($request->hasfile('gambar_usaha')){
            $fileName = time().'_'.$input['gambar_usaha']->getClientOriginalName();
            $input['gambar_usaha']->move(public_path('gambar_usaha'), $fileName);
            $input['gambar_usaha'] = $fileName;
        }else{
            $input['gambar_usaha'] = $oldData->gambar_usaha;
        }
        $profile = ProfileUsaha::find($id)->update($input);

        // dd($profile);
        return redirect()->route('profile_usaha.index');
    }

    public function destroy($id)
    {
        //
    }
}