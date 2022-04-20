<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Models\LokasiTersedia;
use App\Models\Transaksi;
use App\Models\{DetailTransaksi, RiwayatTransaksi, RiwayatPembayaran};
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $kp = KategoriProduk::all();
        $this->getGambarByKategoriProduk($kp);

        // dd($kp);
        return view('users-view.dashboard', compact('kp'));

    }
    protected function getGambarByKategoriProduk($data){
        foreach($data as $key){
            // dd($key);
            $gambarProduk = DB::table('gambar_produks')->where('id_produk', $key->id)->first();
            if($gambarProduk){
                $fileProduk = $gambarProduk;
                // dd($fileProduk);
                $key->gambar_produk = $fileProduk->file;
            }else{
                $key->gambar_produk = "empty";
            }
            
        }
    }

    

    public function usersHome(){
        return view('users-view.dashboard');
    }

    public function AllProduct(){
        // dd('test');
        $produk = DB::table('produks')
                ->leftJoin('kategori_produks', 'produks.id_kategori', 'kategori_produks.id')
                ->whereNull('produks.deleted_at')
                ->select('produks.*', 'kategori_produks.nama_kategori AS kategori_produk')
                ->orderBy('created_at','desc')
                ->get();
        $this->getGambarByKategoriProduk($produk);

        // dd($produk);
        $kp = KategoriProduk::all();

        return view('users-view.our-products', compact('kp','produk'));
    }


    protected function getGambarByIdProduk($data){
        
        $gambarProduk = DB::table('gambar_produks')->where('id_produk', $data->id)->get();
        // dd($gambarProduk);

        foreach ($gambarProduk as $gp ) {
           if($gp){
                $fileProduk = $gp;
                // dd($fileProduk);
                $data->gambar_produk[] = $fileProduk->file;
            }else{
                $data->gambar_produk = "empty";
            }
        }
        // dd($data);
        
    }

    public function detailProduk($id){
        $produk = DB::table('produks')->find($id);
        $getWarna = DB::table('warnas')
                    ->where('id_produk', $id)
                    ->where('status','=','Tersedia')->get();
        // dd(count($getWarna) == 0);

        $this->getGambarByIdProduk($produk);
        // dd($produk);


        return view('users-view.detail-product', compact('produk','getWarna'));
        
    }
    // public function messages()
    // {
    //     return [
    //         'id_warna.required' => 'A ID Warna is required',
    //     ];
    // }
    public function showCart(){
        $email = session()->get('email');
        $getUser = DB::table('users')->where('email', $email)->first();

        // $getOrderProduct = DB::table('detail_transaksis')->where('id_user', $getUser->id)->get();
        $getOrderProduct =  DB::table('detail_transaksis')
                            ->leftJoin('produks','produks.id','detail_transaksis.id_produk')
                            ->where('id_user', $getUser->id)
                            ->where('detail_transaksis.status', 'Dalam Keranjang')
                            ->select('detail_transaksis.*','produks.nama_produk AS nama_produk','produks.status AS status')
                            ->get();
        
        $this->getGambarProdukById($getOrderProduct);
        
        $this->getWarnaProductOrder($getOrderProduct);
        $this->getAllWarna($getOrderProduct);
        // dd($getOrderProduct);

        return view('users-view.cart', compact('getOrderProduct'));
    }
    public function getAllWarna($data){
        foreach ($data as $item) {
            if($item->id_warna){
                $getWarna = DB::table('warnas')->where('id_produk', $item->id_produk)->get();
                // dd($item);
                $item->available_color =  $getWarna;
            }
            else{
                $item->available_color = null;
            }
            
        }

    }


    public function insertCart(Request $r, $id){
        // dd($r);
        //Cek Produk ada Warna
        $email = session()->get('email');
        $getUser = DB::table('users')->where('email', $email)->first();

        $getProdukOrder = DB::table('produks')->where('id', $id)->first();
        $quantiti = 1;
        
        $cekWarna = DB::table('warnas')->where('id_produk', $id)->get();    
        // dd(count($cekWarna));
        if(count($cekWarna) > 0){

            $validate = $this->validate($r, [
                'id_warna' => 'required',
            ],
            [
                'id_warna.required' => 'Pilih warna Produk terlebih dahulu'
            ]
            );
            $idWarna = $r->id_warna;
            $createDetailTransaksi = DB::table('detail_transaksis')->insert([
                'id_user' => $getUser->id,
                'id_produk' => $getProdukOrder->id,
                'id_warna' => $idWarna,
                'harga' => $getProdukOrder->harga,
                'qty' => 1,
                'diskon' => 0,
                'total' => $getProdukOrder->harga * $quantiti
            ]);
        }else{
            $createDetailTransaksi = DB::table('detail_transaksis')->insert([
                'id_user' => $getUser->id,
                'id_produk' => $getProdukOrder->id,
                'harga' => $getProdukOrder->harga,
                'qty' => 1,
                'diskon' => 0,
                'total' => $getProdukOrder->harga * $quantiti
            ]);
        }
        // Creat Detail Transaksi
        // dd($getProdukOrder);
        
        return redirect('detailProduct/'.$id)->with('success','Pesanan anda telah tersimpan dikeranjang!!');
        // return response()->json($createDetailTransaksi, 200);
        
    }

    public function transactionOrder (){
         
        
        $email = session()->get('email');
        $getUser = DB::table('users')->where('email', $email)->first(); 
        
       
        // $getAllDetailTransaksi = DB::table('detail_transaksis')->where('id_user', $getUser->id)->get();
        $getDetailTransactionWithProduk =  DB::table('detail_transaksis')
                                            ->leftJoin('produks','produks.id','detail_transaksis.id_produk')
                                            ->where('id_user', $getUser->id)
                                            ->where('detail_transaksis.status', 'Dalam Keranjang')
                                            ->select('detail_transaksis.*','produks.nama_produk AS nama_produk','produks.status AS status')
                                            ->get();
        
        $this->getGambarProdukById($getDetailTransactionWithProduk);
        $this->getWarnaProductOrder($getDetailTransactionWithProduk);
        $this->getAllWarna($getDetailTransactionWithProduk);
        // dd($getDetailTransactionWithProduk);
        $totalHarga = 0;
        $discount = 0;
        foreach ($getDetailTransactionWithProduk as  $value) {
            $totalHarga = $totalHarga + $value->total;
            $discount = $discount + $value->diskon;
        }
        $extraPay = 0;
        // $summaryPrice = array(
        //     'totalHarga' => $totalHarga,
        //     'extraPay' => $extraPay,
        //     'grandTotal' => $totalHarga + $extraPay
        // );
        $summaryPrice = new \stdClass();
        $summaryPrice->totalHarga = $totalHarga;
        $summaryPrice->extraPay = $extraPay;
        $summaryPrice->discount = $discount;
        $summaryPrice->grandTotal = $totalHarga + $extraPay;
        // dd($summaryPrice);
        

        // dd($cekWarna);


        $lokasi_tersedia = LokasiTersedia::all();
        return view('users-view.transaction-product', compact('summaryPrice','getUser','lokasi_tersedia', 'getDetailTransactionWithProduk'));
    }
    public function checkOutTransaction(Request $request){
        // dd($request);
        $email = session()->get('email');
        $getUser = DB::table('users')->where('email', $email)->first(); 
    
        $request['id_user'] = $getUser->id;
        $request['status_transaksi'] = 'Menunggu Konfirmasi';

        //Make Random Code Transaction
        $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9)  ); 
        $date = date('ds');
        $request['kode_transaksi'] = "#flare_".$getUser->id.$date.$random_number;

        // dd($request->kode_transaksi);




        $validate = $this->validate($request, [
            'id_user' =>'required',
            'kode_transaksi' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tgl_booking' => 'required',
            'jam_booking' => 'required',
            'bentuk_pembayaran' => 'required',
            'status_transaksi' => '',
            'biaya_tambahan' => 'required',
            'total_diskon' => 'required',
            'total_transaksi' => 'required',
            'catatan' => 'required'
        ]);
        // dd($validate);
        DB::beginTransaction();
        try {
            //code...
            $transaksi = Transaksi::create($validate);
            // dd($transaksi);
            $detailTransaksi = DB::table('detail_transaksis')
                                ->where('id_user',$getUser->id)
                                ->where('status', 'Dalam Keranjang')
                                ->get();
            // dd($detailTransaksi);
            
            foreach ($detailTransaksi as $item) {
                // $updateDetailTransaksi = DB::table('detail_transaksis')
                //                         ->where('id',$item->id)
                //                         ->update(['id_transaksi'  => $transaksi->id, 'status' => 'Dalam Pesanan']);
                $updateDetailTransaksi =    DetailTransaksi::where('id', $item->id)
                                            ->update(['id_transaksi' =>$transaksi->id, 'status'=>'Dalam Pesanan']);
                                        
            }
            // $statusTransaksi = DB::table('riwayat_transaksis')->insert([
            //     'id_transaksi'=>$transaksi->id,
            //     'id_user' => $getUser->id,
            //     'status' => $transaksi->status_transaksi
            // ]);
            $statusTransaksi = RiwayatTransaksi::insert([
                'id_transaksi' =>$transaksi->id,
                'id_user' => $getUser->id,
                'status' => $transaksi->status_transaksi
            ]);
            DB::commit();
            return redirect()->route('users-view.history-transaction');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
    
    public function addTotalDp($data){
        foreach ($data as $item ) {
            $item->total_dp1 = $item->total_transaksi / 2;
            $item->total_pelunasan = $item->total_transaksi - $item->total_dp1;
        }
    }
    public function getAllRiwayatTransaksi($data, $userId){
        foreach ($data as $item ) {
            $getRiwayatTransaksi = DB::table('riwayat_transaksis')
                                    ->where('id_transaksi', $item->id)
                                    ->where('id_user', $userId)
                                    ->get();
            $item->riwayat_transaksi = $getRiwayatTransaksi;
        }
    }
    public function getGambarProdukById($data) {
        foreach($data as $key){
            $gambarProduk = DB::table('gambar_produks')->where('id_produk', $key->id_produk)->get();
            $fileProduk = $gambarProduk;
            $key->gambar_produk = $fileProduk;
            
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

    public function editDetailProduct ($id, $id_warna){
        
        // $changeDetailProduk = DB::table('detail_transaksis')->where('id', $id)->first();
        
        // $data = DB::table('warnas')->where('id_produk', $id)->get();
        
        $data = DB::table('detail_transaksis')->where('id', $id)->update(['id_warna' => $id_warna]);
        $message = '<div class="alert alert-warning"  id="updated-message">
                        <strong>Info!</strong> Berhasil mengubah pesanan!!<br><br>
                    </div>';
        
        return response()->json($message, 200);
        // return redirect()->with('updated','Berhasil mengubah pesanan!!');
    }
    public function deleteDetailProduct ($id){
        
        $data = DB::table('detail_transaksis')->where('id', $id)->delete();
        $message = '<div class="alert alert-danger"  id="updated-message">
                        <strong>Info!</strong> Berhasil mengubah pesanan!!<br><br>
                    </div>';

        return response()->json($message, 200);
    }
    public function historyTransaction(){
        $email = session()->get('email');
        $getUser = DB::table('users')->where('email', $email)->first(); 

        //Get History Transaction
        $allTransaksi = Transaksi::where('id_user', session()->get('id_user'))->orderByDesc('id')->get();
        
        // $allTransaksi = DB::table('transaksis')
        //                 ->leftJoin('riwayat_transaksis','riwayat_transaksis.id_transaksi', 'transaksis.id')
        //                 ->whereNull('transaksis.deleted_at')
        //                 ->get(); 
        $this->getAllRiwayatTransaksi($allTransaksi, $getUser->id);
        $this->addTotalDp($allTransaksi);
        // dd($allTransaksi);
        

        
        return view('users-view.history-transaksi', compact('getUser','allTransaksi'));
        
    }
    public function confirmationPayment(Request $request, $id){
        // dd($id, $request);
        $validate = $this->validate($request, [
            'id_transaksi' => 'required',
            'id_user'   => 'required',
            'status' => 'required',
            'total_bayar' => 'required',
            'total_lunas' => 'required',
            'bukti_transfer' => 'required',
            'transfer_di' => 'required',
            'atasnama_pengirim' => 'required',
            'bank_pengirim' => 'required',
            'tgl_transfer' => 'required',
            'catatan' => 'required',
            'kode_transaksi' => 'required'
        ]);
        
        $input = $request->except(['_token']);
        // dd($input);
        if($request->hasfile('bukti_transfer')){
            $fileName = time().'_'.$input['bukti_transfer']->getClientOriginalName();
            $input['bukti_transfer']->move(public_path('bukti_transaksi'), $fileName);
            $input['bukti_transfer'] = $fileName;
        }

        $riwayatPembayaran = RiwayatPembayaran::create($input);
        return redirect()->route('users-view.history-transaction')->with('success','Your Payment Confirmation <strong> "'.$input['kode_transaksi'].'" </strong> has been saved!!');


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