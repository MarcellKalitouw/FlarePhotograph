<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;

class KategoriProdukController extends Controller
{
  
    public function index()
    {
        // $data = DB::table('kategori_produks')->get();
        $data = KategoriProduk::all();
        $this->getGambarByKategoriProduk($data);
        // dd($data);
        return view('kategori_produk.index', compact('data'));
    }

    
    protected function getGambarByKategoriProduk($data){
        foreach($data as $key){
            $gambarProduk = DB::table('gambar_produks')->where('id_produk', $key->id)->first();
            if($gambarProduk){
                $fileProduk = $gambarProduk;
                // dd($fileProduk);
                $key->gambar_produk = $fileProduk->file;
            }else{
                $key->gambar_produkk = "empty";
            }
            
        }
    }

    public function create()
    {
        return view('kategori_produk.create');
    }

    
    public function store(Request $request)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg'
        ]);

        //dd($validate);

        $input = $request->except(['_token', 'gambar']);
        //dd($input);
        $kategori_produk = KategoriProduk::create($input);
        if($request->gambar){
            $path = Storage::disk('public')->putFile('gambar_produk', $request->gambar);
            $gambarProduk = [
                'id_produk' => $kategori_produk->id,
                'file' => $path
            ];
        }
        
        // dd($gambarProduk);
        $saveGambar = GambarProduk::create($gambarProduk);
        
        return redirect()->route('kategori_produk.index');
    }

    
    public function show(KategoriProduk $kategoriProduk)
    {
        
    }

   
    public function edit($id)
    {
        // dd($id);
        $getData = DB::table ('kategori_produks')->where('id', $id)->first();

        return view('kategori_produk.edit', compact('getData'));
    }

    
    public function update(Request $request, $id)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);
        
        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $kategori_produk = KategoriProduk::where('id', $id)->update($input);
       
       
        return redirect()->route('kategori_produk.index');
    }

    
    public function destroy($id)
    {
        $oldData = GambarProduk::where('id_produk', $id)->first();
        // dd($oldData);
        if($oldData){
            Storage::delete('public/'.$oldData->file);
            DB::table('gambar_produks')->where('id_produk',$id)->delete();
        }
        

        KategoriProduk::where('id',$id)->delete();

        return redirect()->route('kategori_produk.index');
    }
}