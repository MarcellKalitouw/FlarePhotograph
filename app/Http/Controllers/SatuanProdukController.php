<?php

namespace App\Http\Controllers;

use App\Models\SatuanProduk;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\LoginController;


class SatuanProdukController extends Controller
{
    protected $LoginController;

    public function __construct(LoginController $LoginController){
        $this->LoginController = $LoginController;
        
    }
    public function cekUser(){
        $login = $this->LoginController->validate_users();
        if($login == false){
            header("Location: http://127.0.0.1:8001/login");
            exit();
        }
    }
    public function index()
    {
        // $this->cekUser();

        // $data = DB::table('satuan_produks')->get();
        $data = DB::table('satuan_produks')
                ->leftjoin('produks','produks.id','satuan_produks.id_p')
                ->leftjoin('satuans', 'satuans.id','satuan_produks.id_satuan')
                ->select('satuan_produks.*','produks.nama_produk AS nama_produk', 'satuans.nama_satuan AS nama_satuan')
                ->whereNull('satuan_produks.deleted_at')
                ->get();

        // dd($data);
        return view('satuan_produk.index', compact('data'));
    }

    
    public function create()
    {
        $satuan = DB::table('satuans')->get();

        $produk = DB::table('produks')->get();

        $satuan_produk = DB::table('satuans')->get();
        // dd($satuan_produk);
        return view('satuan_produk.create', compact('produk','satuan_produk', 'satuan'));
       
    }

   
    public function store(Request $request)
    {
        // dd($request);
        $validate = $this->validate($request, [
            'id_p' => 'required',
            'id_satuan' => 'required'
        ]);

        

        //dd($validate);

        $input = $request->except(['_token']);
        // dd($input);
        $satuan_produk = SatuanProduk::create($input);
        

        return redirect()->route('satuan_produk.index')->with('create', '<strong> Satuan Produk </strong> has created!!');

    }

    
    public function show(SatuanProduk $satuanProduk)
    {
        
    }

    
    public function edit($id)
    {
        // dd($id);
        $satuan = DB::table('satuans')->get();

        $produk = DB::table('produks')->get();

        $getData = DB::table ('satuan_produks')->where('id', $id)->first();
        
        return view('satuan_produk.edit', compact('getData', 'produk', 'satuan'));
    }

    
    public function update(Request $request, $id)
    {
        // dd($request);
        $validate = $this->validate($request, [
            'id_p' => 'required',
            'id_satuan' => 'required'
        ]);

        // dd($validate);

        $input = $request->except(['_token', '_method']);
        // dd($input);
        $satuan_produk = SatuanProduk::where('id', $id)->update($input);
        

        return redirect()->route('satuan_produk.index')->with('update', '<strong> Satuan Produk </strong> has updated!!');
    }

    
    public function destroy($id)
    {
        SatuanProduk::where('id',$id)->delete();

        return redirect()->route('satuan_produk.index')->with('delete', '<strong> Satuan Produk </strong> has deleted!!');
    }
}