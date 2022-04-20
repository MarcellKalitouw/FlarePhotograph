<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use DB;

class DetailTransaksiController extends Controller
{
    
    public function index()
    {
        $data = DB::table('detail_transaksis')->get();
        // dd($data);
        return view('detail_transaksi.index', compact('data'));
    }

    
    public function create()
    {
        $produk = DB::table('produks')->get();

        $transaksi = DB::table('transaksis')->get();

        return view('detail_transaksi.create', compact('produk', 'transaksi'));
    }

    
    public function store(Request $request)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'id_produk' => 'required',
            'id_transaksi' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'total' => 'required',
            'kode_verifikasi' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token']);
        //dd($input);
        $detail_transaksi = DetailTransaksi::create($input);
        

        return redirect()->route('detail_transaksi.index');
    }

    
    public function show(DetailTransaksi $detailTransaksi)
    {
        
    }

    
    public function edit($id)
    {
        // dd($id);

        $produk = DB::table('produks')->get();

        $transaksi = DB::table('transaksis')->get();

        $getData = DB::table ('detail_transaksis')->where('id', $id)->first();

        return view('detail_transaksi.edit', compact('getData', 'produk', 'transaksi'));
    }

    
    public function update(Request $request, $id)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'id_produk' => 'required',
            'id_transaksi' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'total' => 'required',
            'kode_verifikasi' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $detail_transaksi = DetailTransaksi::where('id', $id)->update($input);
        

        return redirect()->route('detail_transaksi.index');
    }

    
    public function destroy($id)
    {
        DetailTransaksi::where('id',$id)->delete();

        return redirect()->route('detail_transaksi.index');
    }
}
