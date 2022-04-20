<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use Illuminate\Http\Request;
use DB;

class AdditionalController extends Controller
{
    
    public function index()
    {
        $data = DB::table('additionals')->get();
        // dd($data);
        return view('additional.index', compact('data'));
    }

    
    public function create()
    {
        return view('additional.create');
    }

    
    public function store(Request $request)
    {
         //dd($request);
         $validate = $this->validate($request, [
            'id_produk' => 'required',
            'id_dt' => 'required',
            'id_transaksi' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'qty' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token']);
        //dd($input);
        $additional = Additional::create($input);
        

        return redirect()->route('additional.index');
    }

    
    public function show(Additional $additional)
    {

    }

    
    public function edit($id)
    {
        $getData = DB::table ('additionals')->where('id', $id)->first();
        
        return view('additional.edit', compact('getData'));
    }

    
    public function update(Request $request, $id)
    {
         //dd($request);
         $validate = $this->validate($request, [
            'id_produk' => 'required',
            'id_dt' => 'required',
            'id_transaksi' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'qty' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $additional = Additional::where('id',$id)->update($input);
        
        return redirect()->route('additional.index');

    }

    
    public function destroy($id)
    {
       $s=additional::where('id',$id)->delete();
       // dd($s);
       return redirect()->route('additional.index');
    }
}
