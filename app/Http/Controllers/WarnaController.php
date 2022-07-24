<?php

namespace App\Http\Controllers;

use App\Models\warna;
use App\Models\Produk;
use Illuminate\Http\Request;
use DB;

class WarnaController extends Controller
{
   
    public function index()
    {
        // $data = DB::table('warnas')->get();
        $data = DB::table('warnas')
                ->leftJoin('produks','produks.id','warnas.id_produk')
                ->select('warnas.*','produks.nama_produk AS nama_produk')
                ->whereNull('warnas.deleted_at')
                ->get();
        // dd($data);
        return view('warna.index', compact('data'));
    }

    
    public function create()
    {
        $produk = Produk::all();
        return view('warna.create', compact('produk'));

    }

    
    public function store(Request $request)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'id_produk' => 'required',
            'nama_warna' => 'required',
            'heksa_warna' => 'required',
            'status' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token']);
        //dd($input);
        $satuan_produk = Warna::create($input);
        

        return redirect()->route('warna.index')->with('create', '<strong> Warna </strong> has created!!');
    }

   
    public function show(warna $warna)
    {
        
    }

    
    public function edit($id)
    {
        // dd($id);
        $produk = Produk::all();
        $getData = DB::table ('warnas')->where('id', $id)->first();
        
        return view('warna.edit', compact('getData', 'produk'));
    }

    
    public function update(Request $request, $id)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'id_produk' => 'required',
            'nama_warna' => 'required',
            'heksa_warna' => 'required',
            'status' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $warna = Warna::where('id', $id)->update($input);
        

        return redirect()->route('warna.index')->with('update', '<strong> Warna </strong> has updated!!');
    }

   
    public function destroy($id)
    {
        Warna::where('id',$id)->delete();

        return redirect()->route('warna.index')->with('delete', '<strong> Warna </strong> has deleted!!');
    }
}