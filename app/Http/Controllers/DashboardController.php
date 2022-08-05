<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\{Transaksi, User, Produk};
class DashboardController extends Controller
{
    
    public function index()
    {
        //
        // dd(session()->all());

        $transaksi = Transaksi::all()->count();
        $pengguna = User::where('tipe', 'Pengguna')->get()->count(); 
        $produk = Produk::all()->count();

        // dd($transaksi, $pengguna, $produk);
        
        return view('dashboard.index', compact('transaksi', 'pengguna', 'produk'));
    }

    public function requestDataTransaksiByYear(Request $req){
        
        $groupByMonth = "YEAR(created_at),MONTH(created_at)";
        $year = $req->year;
        // dd($finish);
        $getByMonth = DB::table('transaksis')
                      ->where('status_transaksi', 'Selesai')
                      ->where('created_at','LIKE',$year."%")
                      ->selectRaw("YEAR(created_at) as Year, MONTH(created_at) as month, count(id) as value")
                      ->groupByRaw($groupByMonth)
                      ->get();
        $getByMonth = $this->convertDateArray($getByMonth);
        // dd($getByMonth);
        return response()->json(['success' => true, 'data' => $getByMonth]);
        
    }
    public function convertDateArray($data){
        // dd($data);
        $newArray = array();
        // $itemArray = new \ArrayObject();
        
        foreach ($data as $item ) {
            $itemArray = new \stdClass();
            $itemArray->y = date('F', strtotime('2022-'.$item->month.'-1')); 
            $itemArray->jumlah = $item->value;
            // dd($itemArray);
            array_push($newArray, $itemArray);
        }
        // dd($newArray);
        return $newArray;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}