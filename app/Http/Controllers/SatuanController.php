<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use DB;

class SatuanController extends Controller
{
    
    public function index()
    {
        // $data = DB::table('satuans')->get();

        $data = DB::table('satuans')
                ->leftjoin('kategori_produks','kategori_produks.id','satuans.id_kp')
                ->select('satuans.*','kategori_produks.nama_kategori AS nama_kategori')
                ->whereNull('satuans.deleted_at')
                ->get();

        // dd($data);
        return view('satuan.index', compact('data'));
    }

    
    public function create()
    {
        $kategori_produk = DB::table('kategori_produks')->get();
        return view('satuan.create', compact('kategori_produk'));
    }

    
    public function store(Request $request)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'nama_satuan' => 'required',
            'id_kp' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token']);
        //dd($input);
        $satuan = DB::table('satuans')->insert($input);

        return redirect()->route('satuan.index');

    }

    
    public function show(Satuan $satuan)
    {
        
    }

    public function edit($id)
    {
        $kategori_produk = DB::table('kategori_produks')->get();

        $getData = DB::table ('satuans')->where('id', $id)->first();
        
        // dd($getData);
        
        return view('satuan.edit', compact('getData', 'kategori_produk'));
    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'nama_satuan' => 'required',
            'id_kp' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $satuan = Satuan::where('id', $id)->update($input);
        

        return redirect()->route('satuan.index');
    }

    
    public function destroy($id)
    {
        $s=Satuan::where('id',$id)->delete();
        // dd($s);
        return redirect()->route('satuan.index');
    }
}