<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
     UsersController,
     SatuanController,
     SatuanProdukController,
     WarnaController,
     AdditionalController,
     KategoriProdukController,
     ProdukController,
     TransaksiController,
     DetailTransaksiController,
     NotifikasiController,
     LoginController,
     HomeController,
     RegisterController,
     LokasiTersediaController,
     BankTransferController,
     ProfileUsahaController,
     VarianProdukController,
     DashboardController
    };
use App\Http\Middleware\CheckStatus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
        return redirect('/landingPage');
});
Route::middleware(['checkStatus'])->group(function () {
    Route::resource('dashboard-admin', DashboardController::class);
    Route::post('ajax-request-transaksiSelesaiByYear', [DashboardController::class, 'requestDataTransaksiByYear'])->name('ajax.ts-byyear');


    Route::resource('satuan', SatuanController::class);
    Route::resource('satuan_produk', SatuanProdukController::class);
    Route::resource('warna', WarnaController::class);
    Route::resource('additional', AdditionalController::class);
    Route::resource('kategori_produk',KategoriProdukController::class);
    Route::resource('produk', ProdukController::class);
    
    //Transaksi
    Route::resource('transaksi', TransaksiController::class);
    Route::get('transaksi_update/{id}/{status}', [TransaksiController::class, 'updateStatus'])->name('transaksi.update-status');
    
    Route::resource('detail_transaksi', DetailTransaksiController::class);
    
    Route::resource('notifikasi', NotifikasiController::class);
    Route::get('update_notifikasi/{id}', [NotifikasiController::class, 'updateNotifikasi'])->name('notifikasi.update-seen');
    

    Route::resource('lokasi_tersedia', LokasiTersediaController::class);

    Route::resource('bank_transfer', BankTransferController::class);

    Route::resource('profile_usaha', ProfileUsahaController::class);

    Route::resource('variant_produk', VarianProdukController::class)->except([
        'create','show','destroy'
    ]);
    Route::get('variant_produk/{id}', [VarianProdukController::class, 'create'])->name('variant_produk.create');
    Route::delete('variant_produk/{id_produk}/${id}/destroy', [VarianProdukController::class, 'destroy'])->name('variant_produk.destroy');
});


// Start middle Universe
Route::resource('users', UsersController::class);

Route::get('tambah_admin', [UsersController::class, 'createAdmin'])->name('create.admin');


Route::resource('login', LoginController::class);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register/pengguna',[RegisterController::class, 'index'])->name('register');
Route::post('register/pengguna/store', [RegisterController::class, 'store'])->name('register.store');
//USERS


Route::resource('landingPage', HomeController::class);
Route::get('ourProduct', [HomeController::class, 'AllProduct'])->name('users-view.ourproduct');
Route::get('detailProduct/{id}', [HomeController::class, 'detailProduk'])->name('users-view.detailproduct');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from FlarePhotograph.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('omegasyaloom@gmail.com')->send(new \App\Mail\NotificationMail($details));
   
    dd("Email is Sent.");
});


Route::get('email_sent/{id}',[HomeController::class, 'sendEmail'])->name('sent-email-transaction');

// Route::get('send-mail', [TransaksiController::class, ''])

//End Middle Universe

Route::middleware(['isPengguna'])->group(function () {
    //Cart
    Route::get('users-cart/', [HomeController::class, 'showCart'])->name('users-view.cart');
    Route::post('insertUserCart/{id}', [HomeController::class, 'insertCart'])->name('users-view.insert-cart');
    

    //Transaction
    Route::get('transaction-order', [HomeController::class, 'transactionOrder'])->name('users-view.transaction');
    Route::get('editDetailTransaction/{id}/{id_warna}', [HomeController::class, 'editDetailProduct'])->name('users-view.transaction-edit-product');
    Route::get('deleteDetailTransaction/{id}', [HomeController::class, 'deleteDetailProduct'])->name('users-view.transaction-delete-product');
    Route::post('checkoutTransaction/', [HomeController::class, 'checkOutTransaction'])->name('users-view.transaction-checkout');
    Route::get('historyTransaction', [HomeController::class, 'historyTransaction'])->name('users-view.history-transaction');
    Route::post('confirmationPayment/{id}', [HomeController::class, 'confirmationPayment'])->name('users-view.transaction-confirmationpayment');
    
});