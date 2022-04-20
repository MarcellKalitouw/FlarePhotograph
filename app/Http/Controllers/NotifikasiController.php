<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use DB;

class NotifikasiController extends Controller
{
    
    public function index()
    {
        $data = DB::table('notifikasis')->get();
        // dd($data);
        return view('notifikasi.index', compact('data'));
    }

    
    public function create()
    {
        return view('notifikasi.create');
    }

    
    public function store(Request $request)
    {
         //dd($request);
         $validate = $this->validate($request, [
            'total_bayar' => 'required',
            'metode_pembayaran' => 'required',
            'id_dt' => 'required',
            'id_transaksi' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token']);
        //dd($input);
        $notifikasi = Notifikasi::create($input);
        return redirect()->route('notifikasi.index');
    }

   
    public function show(Notifikasi $notifikasi)
    {
        
    }

    
    public function edit($id)
    {
         // dd($id);
         $getData = DB::table ('notifikasis')->where('id', $id)->first();
        
         return view('notifikasi.edit', compact('getData'));
    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'total_bayar' => 'required',
            'metode_pembayaran' => 'required',
            'id_dt' => 'required',
            'id_transaksi' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $notifikasi = Notifikasi::where('id', $id)->update($input);
        

        return redirect()->route('notifikasi.index');
    }

    
    public function destroy($id)
    {
        Notifikasi::where('id',$id)->delete();

        return redirect()->route('notifikasi.index');
    }
}
