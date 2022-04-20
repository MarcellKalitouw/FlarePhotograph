<?php

namespace App\Http\Controllers;

use App\Models\BankTransfer;
use Illuminate\Http\Request;

class BankTransferController extends Controller
{
    
    public function validation($data){
        $data->validate([
            'atas_nama' => 'required',
            'no_rek' => 'required',
            'nama_bank' => 'required'
        ]);
        
    }
    public function findId ($id){
        return $data = BankTransfer::find($id);
    }

    public function index()
    {
        
        $data = BankTransfer::get();
        return view('bank_transfer.index', compact('data'));
    }

    public function create()
    {
        
        return view('bank_transfer.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $input = $request->except(['_token']);

        $produk = BankTransfer::create($input);
        return redirect()->route('bank_transfer.index')->with('create', '<strong> Bank transfer atas nama </strong>"'.$input['atas_nama'].'" has created!!.');

        // dd($request);
        
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return view('bank_transfer.edit', [
            'data' => $this->findId($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $this->validation($request);
        $input = $request->except(['_token', '_method']);
        $produk = $this->findId($id)->update($input);
        
        return redirect()->route('bank_transfer.index')->with('update', '<strong> Bank Transfer atas nama </strong>"'.$input['atas_nama'].'" has updated!!.');

    }
public function destroy($id)
    {
        $this->findId($id)->delete();
        return redirect()->route('bank_transfer.index')->with('delete', '<strong> Bank transfer </strong> has deleted!!.');

    }
}