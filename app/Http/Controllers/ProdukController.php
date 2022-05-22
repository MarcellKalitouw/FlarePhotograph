<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\GambarProduk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;

class ProdukController extends Controller
{
    protected $LoginController;

    public function __construct(LoginController $LoginController){
        $this->LoginController = $LoginController;
        // $this->cekUser();
    }
    public function cekUser(){
        $login = $this->LoginController->validate_users();
        if($login == false){
            header("Location: http://127.0.0.1:8000/login");
            exit();
        }
    }
    public function index()
    {
        // $this->cekUser();
        // $this->LoginController->validate_users();
        $data = DB::table('produks')
                ->leftJoin('kategori_produks', 'produks.id_kategori', 'kategori_produks.id')
                ->whereNull('produks.deleted_at')
                ->select('produks.*', 'kategori_produks.nama_kategori AS kategori_produk')
                ->orderBy('created_at','desc')
                ->get();
        // $data = Produk::all();
        $this->getGambarProdukById($data);

        // dd($data);
        
        return view('produk.index', compact('data'));
    }

    public function getGambarProdukById($data) {
        foreach($data as $key){
            $gambarProduk = DB::table('gambar_produks')->where('id_produk', $key->id)->get();
            $fileProduk = $gambarProduk;
            $key->gambar_produk = $fileProduk;

        }
    }
    
    public function create()
    {
        // $this->cekUser();
        $kategori_produk = KategoriProduk::all();
        return view('produk.create', compact('kategori_produk'));
    }

    
    public function store(Request $request)
    {
        //  dd($request);
         $validate = $this->validate($request, [
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
            'kegiatan' => 'required',
            'status' => 'required',
            'studio' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        //dd($validate);

        $input = $request->except(['_token', 'gambar']);
        // dd($input);
        $produk = Produk::create($input);
        $gambarProduk = [];

        foreach ($request->file('gambar') as $file) {
            $path = Storage::disk('public')->putFile('gambar_produk', $file);
            $gambarProduk[] = [
                'id_produk' => $produk->id,
                'file' => $path
            ];
        }
        // dd($gambarProduk);
        $inputGambar = GambarProduk::insert($gambarProduk);
        
        
        

        return redirect()->route('produk.index')->with('create', '<strong> Product </strong>"'.$input['nama_produk'].'" has created!!.');
    }

    
    public function show(Produk $produk)
    {
        
    }

    
    public function edit($id)
    {
        // $this->cekUser();
        $getVariant = DB::table('varian_produks')->where('id_produk', $id)->whereNull('deleted_at')->get();

        $getData = DB::table ('produks')->where('id', $id)->first();

        return view('produk.edit', compact('getData','getVariant'));
    }

    
    public function update(Request $request, $id)
    {
        //  dd($request);
         $validate = $this->validate($request, [
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'kegiatan' => 'required',
            'status' => 'required',
            'studio' => 'required',
            'harga' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $produk = Produk::where('id',$id)->update($input);
        

        return redirect()->route('produk.index')->with('update', '<strong> Product </strong>"'.$input['nama_produk'].'" has updated!!.');
    }

    
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $gambar_produk = GambarProduk::where('id_produk', $id)->get();
        foreach($gambar_produk as $file){
            DB::table('gambar_produks')->where('id_produk',$id)->delete();
            Storage::delete('public/'.$file->file);
        }
        
        Produk::where('id', $id)->delete();

     
        return redirect()->route('produk.index')->with('delete', '<strong> Product </strong>"'.$produk->nama_produk.'" has deleted!!.');
    }
}