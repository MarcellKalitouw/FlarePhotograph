<?php

namespace App\Http\Controllers;

use App\Models\{Transaksi, DetailTransaksi, RiwayatTransaksi, User};
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
                ->orderBy('created_at', 'desc')
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
                                            ->leftJoin('varian_produks', 'varian_produks.id', 'detail_transaksis.id_varian')
                                            ->where('id_transaksi', $id)
                                            ->where('detail_transaksis.status', '!=', 'Dalam Keranjang')
                                            ->select(
                                                        'detail_transaksis.*','produks.*',
                                                        'detail_transaksis.status AS status_detail',
                                                        'varian_produks.nama_varian as nama_varian',
                                                        'varian_produks.harga as harga_varian'
                                                    )
                                            ->get();
                                            // ->dd();
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
        // dd($transaksi, $status);
        try{
        // dd($id, $status);

            $updateStatusTransaksi = Transaksi::where('id', $id)->update(['status_transaksi'=> $status]);
            $detailTransaksi = DB::table('detail_transaksis')
                                ->where('id_transaksi',$id)
                                ->get();
            // dd($updateStatusTransaksi);  
            foreach ($detailTransaksi as $item) {
                $updateDetailTransaksi = DetailTransaksi::where('id', $item->id)
                                        ->update(['id_transaksi' =>$id, 'status'=>$status]);
            }
            $updateRiwayatTransaksi = RiwayatTransaksi::create(['id_transaksi'=>$id,'id_user'=> $transaksi->id_user,'status'=> $status]);

            $getTransaksi = Transaksi::find($id);
            $this->getAllRiwayatTransaksi($getTransaksi, $getTransaksi->id_user);
            $this->getDetailHistoryTransaction($getTransaksi);
            // dd($getTransaksi);

            $getEmail = User::where('id', $getTransaksi->id_user)->first(['id','nama','email']);


            // \Mail::to($getEmail->email)->send(new \App\Mail\NotificationMail($getTransaksi));
            
            
            DB::commit();
            return redirect()->route('transaksi.show', $id)->with('success', 'Status Transaksi behasil di Update');
        }catch(\Exception $e){
            DB::rollback();

            dd($e);
            return redirect()->route('transaksi.show', $id)->with('error', 'Status Transaksi Gagal di Update');
        }
        
    }

    public function getAllRiwayatTransaksi($data, $userId){
        
        $getRiwayatTransaksi = DB::table('riwayat_transaksis')
                                ->where('id_transaksi', $data->id)
                                ->where('id_user', $userId)
                                ->get();
        $data->riwayat_transaksi = $getRiwayatTransaksi;
    }
    public function getDetailHistoryTransaction($data){
        
            $getDetailTransaksi = DB::table('detail_transaksis')
                                ->leftJoin('produks', 'produks.id', 'detail_transaksis.id_produk')
                                ->leftJoin('varian_produks', 'varian_produks.id', 'detail_transaksis.id_varian')
                                ->where('detail_transaksis.id_transaksi', $data->id)
                                ->where('detail_transaksis.status', '!=', 'Dalam Keranjang')
                                ->select(
                                    'detail_transaksis.*','produks.*',
                                    'detail_transaksis.status AS status_detail',
                                    'varian_produks.nama_varian AS nama_varian',
                                    'varian_produks.harga AS harga_varian'
                                )
                                ->get();
            $this->getGambarProdukById($getDetailTransaksi);
            $this->getWarnaProductOrder($getDetailTransaksi);

            
            $data->detail_transaksi = $getDetailTransaksi;
            
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
        // dd($id);    
        Transaksi::where('id', $id)->delete();
        
        return redirect()->route('transaksi.index');
    }
}