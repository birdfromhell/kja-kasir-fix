<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\CashOpnameController;
use App\Http\Controllers\DetailOpController;
use App\Http\Controllers\DetailPbController;
use App\Http\Controllers\DetailPembayaranController;
use App\Http\Controllers\DetailPoController;
use App\Http\Controllers\FakturBeliController;
use App\Http\Controllers\FakturJualController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderPenjualanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenerimaanBarangController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RiwayatBukuBesarController;
use App\Http\Controllers\StokOpnemBarangController;
use App\Http\Controllers\SubBukuBesarController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\UjiCobaController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//aplikasi
Route::get('/setting', [UsersController::class, 'settingAplikasi']);

//user
Route::get('/', function () {
    return redirect('/app/user/login');
});

Route::get('/app/dashboard', [UsersController::class, 'home'])->name('home')->middleware(['auth', 'verified']);
Route::get('/app/user/login', [UsersController::class, 'login'])->name('login');

//Route::post('/loginuser', [UsersController::class, 'loginUser']);

Route::get('forget-password', function () {
    return view('account.forget-password');

});

Route::post('/app/user/login', [UsersController::class, 'loginUser']);

Route::get('/app/user/register', [UsersController::class, 'register']);
Route::post('/app/user/register', [UsersController::class, 'registerUser']);

// Route::get('/sign-up', [UsersController::class, 'register']);
// Route::post('/sign-up', [UsersController::class, 'registerUser']);
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
Route::post('/changePassword', [UsersController::class, 'changePassword']);
//home/dashboard
// Route::get('/home', [UsersController::class, 'home'])->name('home')->middleware(['auth', 'verified']);

Route::get('/home', function () {
    return redirect('/app/dashboard');
});

Route::get('/homeUser', [UsersController::class, 'homeuser'])->name('homeUser')->middleware(['auth', 'verified']);


// Route::group(['middleware' => 'admin'], function () {
//absen
// Route::get('/absen/masuk', [AbsenController::class, 'masuk']);
// Route::get('/absen/keluar', [AbsenController::class, 'keluar'])->middleware('check-kehadiran');
// Route::get('/absen/tidakmasuk', [AbsenController::class, 'tidakmasuk']);
// Route::post('/absen/tidakmasuk/insert', [AbsenController::class, 'inserttidakmasuk']);

//barang

Route::get('/email/verify', function () {

    if (auth()->user()->email_verified_at === null) {
        return view('account.verify-email-new');
    } else {
        return redirect('/home');
    }
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $Request) {
    $Request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Kode verifikasi telah dikirim ke ' . auth()->user()->email . ', silahkan cek email tersebut!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::group(['middleware' => 'auth', 'verified'], function () {
    // Route::group(['middleware' => 'AdminvDev'], function () {

    //settingaplikasi
    Route::get('/setting/set/{id}', [UsersController::class, 'Aplikasiset']);
    Route::get('/setting', [UsersController::class, 'settingAplikasi']);
    //barang
    Route::get('/app/barang', [BarangController::class, 'index']);

    Route::get('/app/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/barang-update/{id}', [BarangController::class, 'update']);

    Route::delete('/app/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');


    //kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori-insert', [KategoriController::class, 'store']);
    Route::get('/kategori-edit/{id}', [KategoriController::class, 'edit']);
    Route::post('/kategori-update/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori-delete/{id}', [KategoriController::class, 'destroy']);

    //kelompok
    Route::get('/app/kelompok', [KelompokController::class, 'index'])->name('kelompok.index'); // Halaman daftar
    Route::get('/app/kelompok/create', [KelompokController::class, 'create'])->name('kelompok.create'); // Halaman tambah
    Route::post('/kelompok-insert', [KelompokController::class, 'store'])->name('kelompok.store'); // Proses tambah
    Route::get('/app/kelompok/edit/{id}', [KelompokController::class, 'edit'])->name('kelompok.edit'); // Halaman edit
    Route::put('/kelompok-update/{id}', [KelompokController::class, 'update'])->name('kelompok.update');

    Route::delete('/app/kelompok/delete/{id}', [KelompokController::class, 'destroy']); // Proses hapus

    //akun
    Route::get('/akun', [AkunController::class, 'akun']);
    Route::get('/akun/filter', [AkunController::class, 'akunfilter']);
    Route::get('/subakun', [AkunController::class, 'subakun']);


    //perusahaan
    // Route::get('/relasi', [PerusahaanController::class, 'index']);
    Route::get('/app/relasi', [PerusahaanController::class, 'index']);
    Route::get('/tambahrelasi', [PerusahaanController::class, 'create']);
    Route::post('/relasi-insert', [PerusahaanController::class, 'store']);
    Route::delete('/app/relasi/delete/{id}', [PerusahaanController::class, 'destroy']);

    Route::get('/app/relasi/edit/{id}', [PerusahaanController::class, 'edit']);
    Route::post('/relasi-update/{id}', [PerusahaanController::class, 'update']);


    //akun
    // Route::get('/profile', [PerusahaanController::class, 'profile']);
    Route::get('/app/user/profile', [PerusahaanController::class, 'profile']);
    Route::get('/app/user/edit', [PerusahaanController::class, 'profileedit']);
    Route::get('/profile-edit', [PerusahaanController::class, 'profileedit']);
    Route::get('/akun/filter', [AkunController::class, 'akunfilter']);
    Route::get('/subakun', [AkunController::class, 'subakun']);

    //ujicoba
    Route::get('/uji', [UjiCobaController::class, 'index']);
    Route::get('/onscroll', [UjiCobaController::class, 'onscrolltext']);
    Route::get('/darkmode', [UjiCobaController::class, 'darkmode']);
    Route::get('/dropdown', [UjiCobaController::class, 'dropdown']);
    Route::get('/checkbox', [UjiCobaController::class, 'checkbox']);

    //buku besar ma
    Route::get('/bukubesar', [BukuBesarController::class, 'index']);
    Route::get('/bukubesar/edit/{id}', [BukuBesarController::class, 'edit']);
    Route::post('/bukubesar/insert', [BukuBesarController::class, 'insert']);
    Route::post('/bukubesar/update/{id}', [BukuBesarController::class, 'update']);
    Route::get('/dataSJ/{status}/{id}', [SuratJalanController::class, 'status']);


    //sub buku besar ma
    Route::get('/subbukuBesar', [SubBukuBesarController::class, 'index']);
    Route::get('/subbukuBesar/edit/{id}', [SubBukuBesarController::class, 'edit']);
    Route::post('/subbukuBesar/insert', [SubBukuBesarController::class, 'insert']);
    Route::post('/subbukuBesar/update/{id}', [SubBukuBesarController::class, 'update']);

    Route::get('/purchase-orders', [PurchaseOrderController::class, 'iseng']);
    Route::get('/penerimaaan-barang', [PenerimaanBarangController::class, 'iseng']);
    Route::get('/pb', [UjiCobaController::class, 'pb']);

    // sumpah ada kodingan goib asli (kali)

    Route::get('/print/faktur/{id_fb}/{id_pb}', [FakturBeliController::class, 'print']);

    // akun
    Route::get('/akun-update/{id}', [AkunController::class, 'updateakun']);
    Route::get('/perusahaan-update/{id}', [AkunController::class, 'updateperusahaan']);

    // laporan
    Route::get('/laporan/neraca', [LaporanController::class, 'neraca']);
    Route::get('/laporan/laba-rugi', [LaporanController::class, 'labarugi']);
    Route::post('/laporan/laba-rugi', [LaporanController::class, 'labarugiwithtgl']);
    Route::get('/laporan/bukubesar/{no_akun}', [RiwayatBukuBesarController::class, 'index']);
    Route::post('/laporan/bukubesar/{no_akun}', [RiwayatBukuBesarController::class, 'index']);
    Route::get('/tipeAkun', [AkunController::class, 'tipe']);
    Route::post('/tipeAkun/insert', [AkunController::class, 'tipecreate']);
    // });

    //po
    Route::get('/purchaseOrder', [PurchaseOrderController::class, 'purchaseOrder']);
    Route::get('/purchaseOrder/create', [PurchaseOrderController::class, 'CreatepurchaseOrder']);
    Route::get('/dataPO', [PurchaseOrderController::class, 'index']);
    Route::get('/dataPO/edit/{id}', [PurchaseOrderController::class, 'edit']);
    Route::post('/dataPO/detailpo/edit/{id_po}', [DetailPoController::class, 'edit']);
    // Route::get('/dataPO/{status}/{id}', [PurchaseOrderController::class, 'status']);
    Route::get('/dataPO/laporan', [PurchaseOrderController::class, 'laporan']);
    Route::get('/dataPO/print/laporan/{id_po}', [PurchaseOrderController::class, 'print']);
    Route::get('/dataPO/update-status/{id}', [PurchaseOrderController::class, 'status']);


    //pb
    Route::get('/dataPB', [PenerimaanBarangController::class, 'index']);
    Route::get('/dataPB/laporan', [PenerimaanBarangController::class, 'laporan']);
    Route::get('/dataPB/edit/{id}', [PenerimaanBarangController::class, 'edit']);
    Route::get('/dataPB/faktur/{id}', [PenerimaanBarangController::class, 'faktur']);
    Route::get('/dataPB/{status}/{id}', [PenerimaanBarangController::class, 'status']);
    Route::get('/dataPB/detailpb/edit/{id}', [DetailPbController::class, 'edit']);
    Route::get('/PenerimaanBarang', [PenerimaanBarangController::class, 'PenerimaanBarang']);
    Route::get('/PenerimaanBarang/create', [PenerimaanBarangController::class, 'CreatePenerimaanBarang']);
    Route::get('/laporan/print/{id_po}/{id_pb}', [PenerimaanBarangController::class, 'print']);

    //fb
    Route::get('/dataFB', [FakturBeliController::class, 'index']);
    Route::get('/dataFB/laporan', [FakturBeliController::class, 'laporan']);
    Route::get('/dataFB/edit/{id}', [FakturBeliController::class, 'edit']);
    Route::get('/dataFB/{status}/{id}', [FakturBeliController::class, 'status']);
    Route::get('/dataFB/detailpb/edit/{id}', [DetailPbController::class, 'edit']);
    Route::get('/faktur/{id_pb}', [PenerimaanBarangController::class, 'faktur']);
    Route::get('/fakturbeli/{id}/create', [FakturBeliController::class, 'createfb']);

    //op(orderpenjualan(so))
    Route::get('/orderPenjualan', [OrderPenjualanController::class, 'OrderPenjualan']);
    Route::get('/orderPenjualan/laporan', [OrderPenjualanController::class, 'laporan']);
    Route::get('/orderPenjualan/create', [OrderPenjualanController::class, 'CreateOrderPenjualan']);
    Route::get('/app/dataOP', [OrderPenjualanController::class, 'index']);
    Route::get('/dataOP/edit/{id}', [OrderPenjualanController::class, 'edit']);

    Route::post('/dataOP/detailop/edit/{id}', [DetailOpController::class, 'edit']);

    Route::get('/dataOP/update-status/{id}', [OrderPenjualanController::class, 'status']);
    Route::get('/dataOP/print/laporan/{id_po}', [OrderPenjualanController::class, 'print']);

    //sulatjalan lo
    Route::get('/app/dataSJ', [SuratJalanController::class, 'index']);
    Route::get('/SuratJalan', [SuratJalanController::class, 'SuratJalan']);
    Route::get('/SuratJalan/create', [SuratJalanController::class, 'CreateSuratJalan']);
    Route::get('/dataSJ/laporan', [SuratJalanController::class, 'laporan']);
    Route::get('/dataSJ/edit/{id}', [SuratJalanController::class, 'edit']);
    Route::get('/dataSJ/{status}/{id}', [SuratJalanController::class, 'status']);
    Route::get('/SJ/laporan/print/{id_so}/{id_sj}', [SuratJalanController::class, 'print']);



    // fj
    Route::get('/app/dataFJ', [FakturJualController::class, 'index']);
    Route::get('/fakturjual/{id_sj}', [SuratJalanController::class, 'faktur']);
    Route::get('/fakturjual/{id}/create', [FakturJualController::class, 'createfj']);
    Route::get('/print/fakturjual/{id_fj}/{id_sj}', [FakturJualController::class, 'print']);

    // fj
    // Route::get('/dataFJ', [FakturJualController::class, 'index']);
    Route::get('/jurnal/{id_sj}', [JurnalController::class, 'jurnal']);
    Route::get('/jurnal/{id_sj}/create', [JurnalController::class, 'create']);

    // so barang
    Route::get('/stok-opnem/barang/{barang_id}', [StokOpnemBarangController::class, 'index']);
    Route::get('/stok-opnem/barang/{barang_id}/print', [StokOpnemBarangController::class, 'print']);
    Route::post('/stok-opnem/barang/{barang_id}/print', [StokOpnemBarangController::class, 'print']);
    // Route::post('/fakturjual/{id}/create', [FakturJualController::class, 'createfj']);
    // Route::get('/print/fakturjual/{id_fj}/{id_sj}', [FakturJualController::class, 'print']);
    // });


    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/{id_user}/{id_bayar}', [PembayaranController::class, 'createtahap1']);
    Route::get('/autojurnal/{user_id}/{id_bayar}', [PembayaranController::class, 'indextahap2']);
    Route::get('/autojurnal/{user_id}/{id_bayar}/set', [PembayaranController::class, 'createtahap2']);
    Route::get('/dataPayment', [PembayaranController::class, 'dataPayment']);
    // Route::get('/pembayaran/{akun_debet}/{id}', [PembayaranController::class, 'faktur']);
    // Route::post('/pembayaran/{akun_debet}/{id}/create', [PembayaranController::class, 'createfj']);
    // Route::get('/print/fakturjual/{id_fj}/{id_sj}', [PembayaranController::class, 'print']);

    Route::get('/laporan/pembelian', [LaporanController::class, 'pembelian']);
    Route::get('/laporan/pembelian/print', [LaporanController::class, 'printpembelian']);

    Route::get('/laporan/penjualan', [LaporanController::class, 'penjualan']);
    Route::get('/laporan/penjualan/print', [LaporanController::class, 'printpenjualan']);

    Route::get('/input-lain', [JurnalController::class, 'inputlain']);
    Route::post('/input-lain', [JurnalController::class, 'jurnallain']);

    Route::get('/so-barang-manual', [BarangController::class, 'sobarangmanual']);
    Route::post('/so-barang-update', [BarangController::class, 'sobarangupdate']);

    Route::get('/cash-opnem', [CashOpnameController::class, 'data']);
    Route::post('/cash-opnem/update', [CashOpnameController::class, 'update']);



    Route::get('/cash-opnem/print', [CashOpnameController::class, 'print']);
    // });
});
