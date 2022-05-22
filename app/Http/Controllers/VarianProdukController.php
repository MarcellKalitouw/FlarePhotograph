<?php

namespace App\Http\Controllers;

use App\Models\VarianProduk;
use Illuminate\Http\Request;
use DB;

class VarianProdukController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function formValidation($req){
        $this->validate($req, [
            'nama_varian' => 'required',
            'id_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
    }

    
    public function create($id)
    {
        // dd($id);
        return view('variant_produk.create', compact('id'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->formValidation($request);
        

        $input = $request->except(['_token']);
        
        $variant_produk = VarianProduk::create($input);
        
        return redirect()->route('produk.edit',$request->id_produk);
        
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $getData = VarianProduk::where('id',$id)->first();
        // dd($getData);
        return view('variant_produk.edit', compact('getData'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id_produk,$id)
    {
        VarianProduk::where('id',$id)->delete();

        
        return redirect()->route('produk.edit',$id_produk);
    }
}