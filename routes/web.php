<?php

//use App\Http\Controllers\AbsenController;
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

Route::post('/loginuser', [UsersController::class, 'loginUser']);

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


Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('app')->group(function () {
        // UsersController
        Route::prefix('setting')->group(function () {
            Route::get('set/{id}', [UsersController::class, 'Aplikasiset']);
            Route::get('/', [UsersController::class, 'settingAplikasi']);
        });

        // BarangController
        Route::prefix('barang')->group(function () {
            Route::get('/', [BarangController::class, 'index']);
            Route::post('insert', [BarangController::class, 'store']);
            Route::get('edit/{id}', [BarangController::class, 'edit']);
            Route::post('update/{id}', [BarangController::class, 'update']);
            Route::get('delete/{id}', [BarangController::class, 'destroy']);
            Route::get('print', [BarangController::class, 'print']);
            Route::get('so-manual', [BarangController::class, 'sobarangmanual']);
            Route::post('so-update', [BarangController::class, 'sobarangupdate']);
        });

        // KategoriController
        Route::prefix('kategori')->group(function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::post('insert', [KategoriController::class, 'store']);
            Route::get('edit/{id}', [KategoriController::class, 'edit']);
            Route::post('update/{id}', [KategoriController::class, 'update']);
            Route::get('delete/{id}', [KategoriController::class, 'destroy']);
        });

        // KelompokController
        Route::prefix('kelompok')->group(function () {
            Route::get('/', [KelompokController::class, 'index']);
            Route::post('insert', [KelompokController::class, 'store']);
            Route::get('edit/{id}', [KelompokController::class, 'edit']);
            Route::post('update/{id}', [KelompokController::class, 'update']);
            Route::get('delete/{id}', [KelompokController::class, 'destroy']);
        });

        // AkunController
        Route::prefix('akun')->group(function () {
            Route::get('/', [AkunController::class, 'akun']);
            Route::get('filter', [AkunController::class, 'akunfilter']);
            Route::get('sub', [AkunController::class, 'subakun']);
            Route::get('update/{id}', [AkunController::class, 'updateakun']);
            Route::get('tipe', [AkunController::class, 'tipe']);
            Route::post('tipe/insert', [AkunController::class, 'tipecreate']);
        });

        // PerusahaanController
        Route::prefix('relasi')->group(function () {
            Route::get('/', [PerusahaanController::class, 'index']);
            Route::get('tambah', [PerusahaanController::class, 'create']);
            Route::post('insert', [PerusahaanController::class, 'store']);
            Route::get('delete/{id}', [PerusahaanController::class, 'destroy']);
            Route::get('edit/{id}', [PerusahaanController::class, 'edit']);
            Route::post('update/{id}', [PerusahaanController::class, 'update']);
        });

        Route::prefix('user')->group(function () {
            Route::get('profile', [PerusahaanController::class, 'profile']);
            Route::get('edit', [PerusahaanController::class, 'profileedit']);
        });

        // UjiCobaController
        Route::prefix('uji')->group(function () {
            Route::get('/', [UjiCobaController::class, 'index']);
            Route::get('onscroll', [UjiCobaController::class, 'onscrolltext']);
            Route::get('darkmode', [UjiCobaController::class, 'darkmode']);
            Route::get('dropdown', [UjiCobaController::class, 'dropdown']);
            Route::get('checkbox', [UjiCobaController::class, 'checkbox']);
            Route::get('pb', [UjiCobaController::class, 'pb']);
        });

        // BukuBesarController
        Route::prefix('bukubesar')->group(function () {
            Route::get('/', [BukuBesarController::class, 'index']);
            Route::get('edit/{id}', [BukuBesarController::class, 'edit']);
            Route::post('insert', [BukuBesarController::class, 'insert']);
            Route::post('update/{id}', [BukuBesarController::class, 'update']);
        });

        // SubBukuBesarController
        Route::prefix('subbukubesar')->group(function () {
            Route::get('/', [SubBukuBesarController::class, 'index']);
            Route::get('edit/{id}', [SubBukuBesarController::class, 'edit']);
            Route::post('insert', [SubBukuBesarController::class, 'insert']);
            Route::post('update/{id}', [SubBukuBesarController::class, 'update']);
        });

        // PurchaseOrderController
        Route::prefix('purchaseorder')->group(function () {
            Route::get('/', [PurchaseOrderController::class, 'purchaseOrder']);
            Route::get('create', [PurchaseOrderController::class, 'CreatepurchaseOrder']);
            Route::get('data', [PurchaseOrderController::class, 'index']);
            Route::get('data/edit/{id}', [PurchaseOrderController::class, 'edit']);
            Route::get('data/laporan', [PurchaseOrderController::class, 'laporan']);
            Route::get('data/print/laporan/{id_po}', [PurchaseOrderController::class, 'print']);
            Route::get('data/update-status/{id}', [PurchaseOrderController::class, 'status']);
        });

        // DetailPoController
        Route::post('datapo/detailpo/edit/{id_po}', [DetailPoController::class, 'edit']);

        // PenerimaanBarangController
        Route::prefix('penerimaanbarang')->group(function () {
            Route::get('/', [PenerimaanBarangController::class, 'PenerimaanBarang']);
            Route::get('create', [PenerimaanBarangController::class, 'CreatePenerimaanBarang']);
            Route::get('data', [PenerimaanBarangController::class, 'index']);
            Route::get('data/laporan', [PenerimaanBarangController::class, 'laporan']);
            Route::get('data/edit/{id}', [PenerimaanBarangController::class, 'edit']);
            Route::get('data/faktur/{id}', [PenerimaanBarangController::class, 'faktur']);
            Route::get('data/{status}/{id}', [PenerimaanBarangController::class, 'status']);
            Route::get('laporan/print/{id_po}/{id_pb}', [PenerimaanBarangController::class, 'print']);
        });

        // DetailPbController
        Route::get('datapb/detailpb/edit/{id}', [DetailPbController::class, 'edit']);

        // FakturBeliController
        Route::prefix('fakturbeli')->group(function () {
            Route::get('data', [FakturBeliController::class, 'index']);
            Route::get('data/laporan', [FakturBeliController::class, 'laporan']);
            Route::get('data/edit/{id}', [FakturBeliController::class, 'edit']);
            Route::get('data/{status}/{id}', [FakturBeliController::class, 'status']);
            Route::get('{id}/create', [FakturBeliController::class, 'createfb']);
            Route::get('print/{id_fb}/{id_pb}', [FakturBeliController::class, 'print']);
        });

        // OrderPenjualanController
        Route::prefix('orderpenjualan')->group(function () {
            Route::get('/', [OrderPenjualanController::class, 'OrderPenjualan']);
            Route::get('laporan', [OrderPenjualanController::class, 'laporan']);
            Route::get('create', [OrderPenjualanController::class, 'CreateOrderPenjualan']);
            Route::get('data', [OrderPenjualanController::class, 'index']);
            Route::get('data/edit/{id}', [OrderPenjualanController::class, 'edit']);
            Route::get('data/update-status/{id}', [OrderPenjualanController::class, 'status']);
            Route::get('data/print/laporan/{id_po}', [OrderPenjualanController::class, 'print']);
        });

        // DetailOpController
        Route::post('dataop/detailop/edit/{id}', [DetailOpController::class, 'edit']);

        // SuratJalanController
        Route::prefix('suratjalan')->group(function () {
            Route::get('/', [SuratJalanController::class, 'SuratJalan']);
            Route::get('create', [SuratJalanController::class, 'CreateSuratJalan']);
            Route::get('data', [SuratJalanController::class, 'index']);
            Route::get('data/laporan', [SuratJalanController::class, 'laporan']);
            Route::get('data/edit/{id}', [SuratJalanController::class, 'edit']);
            Route::get('data/{status}/{id}', [SuratJalanController::class, 'status']);
            Route::get('laporan/print/{id_so}/{id_sj}', [SuratJalanController::class, 'print']);
        });

        // FakturJualController
        Route::prefix('fakturjual')->group(function () {
            Route::get('data', [FakturJualController::class, 'index']);
            Route::get('{id}/create', [FakturJualController::class, 'createfj']);
            Route::get('print/{id_fj}/{id_sj}', [FakturJualController::class, 'print']);
        });

        // JurnalController
        Route::prefix('jurnal')->group(function () {
            Route::get('{id_sj}', [JurnalController::class, 'jurnal']);
            Route::get('{id_sj}/create', [JurnalController::class, 'create']);
            Route::get('input-lain', [JurnalController::class, 'inputlain']);
            Route::post('input-lain', [JurnalController::class, 'jurnallain']);
        });

        // StokOpnemBarangController
        Route::prefix('stok-opnem/barang/{barang_id}')->group(function () {
            Route::get('/', [StokOpnemBarangController::class, 'index']);
            Route::get('print', [StokOpnemBarangController::class, 'print']);
            Route::post('print', [StokOpnemBarangController::class, 'print']);
        });

        // PembayaranController
        Route::prefix('pembayaran')->group(function () {
            Route::get('/', [PembayaranController::class, 'index']);
            Route::get('{id_user}/{id_bayar}', [PembayaranController::class, 'createtahap1']);
            Route::get('data', [PembayaranController::class, 'dataPayment']);
        });

        Route::prefix('autojurnal/{user_id}/{id_bayar}')->group(function () {
            Route::get('/', [PembayaranController::class, 'indextahap2']);
            Route::get('set', [PembayaranController::class, 'createtahap2']);
        });

        // LaporanController
        Route::prefix('laporan')->group(function () {
            Route::get('neraca', [LaporanController::class, 'neraca']);
            Route::get('laba-rugi', [LaporanController::class, 'labarugi']);
            Route::post('laba-rugi', [LaporanController::class, 'labarugiwithtgl']);
            Route::get('bukubesar/{no_akun}', [RiwayatBukuBesarController::class, 'index']);
            Route::post('bukubesar/{no_akun}', [RiwayatBukuBesarController::class, 'index']);
            Route::get('pembelian', [LaporanController::class, 'pembelian']);
            Route::get('pembelian/print', [LaporanController::class, 'printpembelian']);
            Route::get('penjualan', [LaporanController::class, 'penjualan']);
            Route::get('penjualan/print', [LaporanController::class, 'printpenjualan']);
        });

        // CashOpnameController
        Route::prefix('cash-opnem')->group(function () {
            Route::get('/', [CashOpnameController::class, 'data']);
            Route::post('update', [CashOpnameController::class, 'update']);
            Route::get('print', [CashOpnameController::class, 'print']);
        });
    });
}
);
