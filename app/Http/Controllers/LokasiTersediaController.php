<?php

namespace App\Http\Controllers;

use App\Models\LokasiTersedia;
use Illuminate\Http\Request;
use DB;

class LokasiTersediaController extends Controller
{
   
    public function index()
    {
        
        $data = LokasiTersedia::all();
        // dd($data);

        return view('lokasi_tersedia.index', compact('data'));
        
    }

    
    public function create()
    {
        return view('lokasi_tersedia.create');

    }

    
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'nama_lokasi' => 'required',
            'harga' => 'required',
            'catatan' => 'required'
        ]);

        $input = $request->except(['_token']);
        $produk = LokasiTersedia::create($input);

        return redirect()->route('lokasi_tersedia.index')->with('create', '<strong> Lokasi Tersedia </strong>"'.$input['nama_lokasi'].'" has created!!.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
        $lk = LokasiTersedia::findOrFail($id);
        // dd($lk);
        return view('lokasi_tersedia.edit', compact('lk'));

    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'nama_lokasi' => 'required',
            'harga' => 'required',
            'catatan' => 'required'
        ]);

        $input = $request->except(['_token', '_method']);
        $produk = LokasiTersedia::where('id',$id)->update($input);
        
        return redirect()->route('lokasi_tersedia.index')->with('update', '<strong> Lokasi Tersedia </strong>"'.$input['nama_lokasi'].'" has updated!!.');

    }

    
    public function destroy($id)
    {
        $lk = LokasiTersedia::where('id',$id)->delete();
        // dd($s);
        return redirect()->route('lokasi_tersedia.index');
    }
}