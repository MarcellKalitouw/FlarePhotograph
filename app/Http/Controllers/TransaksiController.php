<?php

namespace App\Http\Controllers;

use App\Models\{Transaksi, DetailTransaksi, RiwayatTransaksi};
use Illuminate\Http\Request;

use DB;

class TransaksiController extends Controller
{
   
    public function index()
    {
        // $data = DB::table('transaksis')->get();
        $data = DB::table('transaksis')
                ->leftjoin('users','users.id','transaksis.id_user')
                ->select('transaksis.*', 'users.nama AS nama_user')
                ->whereNull('transaksis.deleted_at')
                ->get();
        
        // dd($data);
        return view('transaksi.index', compact('data'));
    }

    
    public function create()
    {
        $users = DB::table('users')->get();

        return view('transaksi.create', compact('users'));
    }

   
    public function store(Request $request)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'id_user' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jam_booking' => 'required',
            'jam_mulai' => 'required',
            'total_order' => 'required',
            'status' => 'required',
            'catatan' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token']);
        //dd($input);
        $transaksi = Transaksi::create($input);
        

        return redirect()->route('transaksi.index');
    }

    
    public function show($id)
    {
        // dd($id);
        $getDetailTransactionWithProduk = DB::table('detail_transaksis')
                                            ->leftJoin('produks', 'produks.id', 'detail_transaksis.id_produk')
                                            ->where('id_transaksi', $id)
                                            ->where('detail_transaksis.status', '!=', 'Dalam Keranjang')
                                            ->select('detail_transaksis.*','produks.*', 'detail_transaksis.status AS status_detail')
                                            ->get();
        $this->getGambarProdukById($getDetailTransactionWithProduk);
        $this->getWarnaProductOrder($getDetailTransactionWithProduk);
        

        $getTransaksi = DB::table('transaksis')
                        ->leftjoin('users','users.id','transaksis.id_user')
                        ->select('transaksis.*', 'users.nama AS nama_user')
                        ->whereNull('transaksis.deleted_at')
                        ->where('transaksis.id', $id)
                        ->first();


        $getRiwayatPembayaran = DB::table('riwayat_pembayarans')->where('id_transaksi',$id)->get();
        $getRiwayatTransaksi = DB::table('riwayat_transaksis')
                                ->leftJoin('transaksis', 'transaksis.id', 'riwayat_transaksis.id_transaksi')
                                ->leftJoin('users', 'users.id', 'riwayat_transaksis.id_user')
                                ->where('id_transaksi', $id)
                                ->select('riwayat_transaksis.*','transaksis.kode_transaksi AS kode_transaksi','users.nama AS nama_user')
                                ->get();
        // dd($getTransaksi);
        // dd($getDetailTransactionWithProduk);
        // dd($getRiwayatTransaksi, $getRiwayatPembayaran);

        return view('transaksi.detail', compact('getRiwayatPembayaran','getRiwayatTransaksi','getDetailTransactionWithProduk', 'getTransaksi'));
    }

    public function updateStatus($id, $status){
        DB::beginTransaction();
        $transaksi = Transaksi::findOrFail($id);
        // dd($transaksi);
        try{
        // dd($id, $status);

            $updateStatusTransaksi = Transaksi::where('id', $id)->update(['status_transaksi'=> $status]);
            $detailTransaksi = DB::table('detail_transaksis')
                                ->where('id_transaksi',$id)
                                ->get();
            // dd($detailTransaksi);
            foreach ($detailTransaksi as $item) {
                $updateDetailTransaksi = DetailTransaksi::where('id', $item->id)
                                        ->update(['id_transaksi' =>$id, 'status'=>$status]);
            }
            $updateRiwayatTransaksi = RiwayatTransaksi::create(['id_transaksi'=>$id,'id_user'=> $transaksi->id_user,'status'=> $status]);
            DB::commit();
            return redirect()->route('transaksi.show', $id)->with('success', 'Status Transaksi behasil di Update');
        }catch(\Exception $e){
            DB::rollback();

            // dd($e);
            return redirect()->route('transaksi.show', $id)->with('error', 'Status Transaksi Gagal di Update');
        }
        
    }

    public function getGambarProdukById($data) {
        foreach($data as $key){
            $gambarProduk = DB::table('gambar_produks')->where('id_produk', $key->id_produk)->get();
            $fileProduk = $gambarProduk;
            $key->gambar_produk = $fileProduk;
            
        }
    }
    public function getProductDetail($data){
        foreach ($data as $item ) {
            $detailProduk = DB::table('produks')->where('id', $item->id_produk)->first();
            $item->detail_produk = $detailProduk;
            
        }
    }
    public function getWarnaProductOrder($data){
        foreach ($data as $key) {
            $warna = DB::table('warnas')->where('id', $key->id_warna)->first();
            // dd($warna);
            $codeWarna = $warna;
            $key->warna = $codeWarna;
        }
    }

    
    public function edit($id)
    {
        $getData = DB::table ('transaksis')->where('id', $id)->first();

        $users = DB::table('users')->get();

        
        return view('transaksi.edit', compact('getData', 'users'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $validate = $this->validate($request, [
            'id_user' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jam_booking' => 'required',
            'jam_mulai' => 'required',
            'total_order' => 'required',
            'status' => 'required',
            'catatan' => 'required'
        ]);

        //dd($validate);

        $input = $request->except(['_token', '_method']);
        //dd($input);
        $transaksi = Transaksi::where('id', $id)->update($input);
        

        return redirect()->route('transaksi.index');
    }
        
    
    public function destroy($id)
    {
        Transaksi::where('id', $id)->delete();
        
        return redirect()->route('transaksi.index');
    }
}