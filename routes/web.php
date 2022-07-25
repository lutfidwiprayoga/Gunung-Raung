<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\ManagementKuotaController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\TiketPDFController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WisatawanController;
use App\Http\Controllers\Auth\GantiPasswordController;
use App\Http\Controllers\Auth\UpdateProfilController;
use App\Http\Controllers\CariController;
use App\Http\Controllers\Guide\ConfirmController;
use App\Http\Controllers\Guide\DashboardController as GuideDashboardController;
use App\Http\Controllers\Guide\PerjalananController;
use App\Http\Controllers\Guide\PerjalananMasukController;
use App\Http\Controllers\Guide\RiwayatPerjalananController;
use App\Http\Controllers\Wisatawan\KuotaController;
use App\Http\Controllers\Wisatawan\MyOrderController;
use App\Http\Controllers\Wisatawan\PemesananController;
use App\Http\Controllers\Wisatawan\PendakianController;
use App\Http\Controllers\Wisatawan\RatingController;
use App\Http\Controllers\Wisatawan\TiketPDFController as WisatawanTiketPDFController;
use App\Models\City;
use App\Models\Kuota;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/welcome', function () {
//     return view('welcome');
// });

//Front End & Publik
Route::get('/', function () {
    return view('frontend.beranda');
});

Route::get('/sop', function () {
    return view('frontend.sop');
});

Route::get('/panduan', function () {
    return view('frontend.panduan');
});

Route::get('/cek-kodebooking/cari', [CariController::class, 'cari'])->name('caripesanan.get');

Route::get('/index/sop', function () {
    return view('frontend.bookingsop');
});
Route::get('/index/checklist', function () {
    return view('frontend.checklist');
});


//verifikasi email
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ubah password
Route::get('/gantipassword', [GantiPasswordController::class, 'edit'])->name('password.edit');
Route::post('/gantipassword', [GantiPasswordController::class, 'update'])->name('password.ganti');
//edit profil
Route::get('/updateprofil', [UpdateProfilController::class, 'edit'])->name('profil.edit');
Route::post('/updateprofil', [UpdateProfilController::class, 'update'])->name('profil.update');

Route::get('/city/{id}', function ($id) {
    $kota = City::where('province_id', $id)->get();
    return response()->json($kota);
});
Route::get('/kuota/{id}', function ($id) {
    $kuota = Kuota::where('periode_id', $id)->get();
    return response()->json($kuota);
});

//Admin
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment');
        Route::get('/payment/detail/{id}', [PaymentController::class, 'detail'])->name('admin.payment.detail');
        Route::get('/payment/terima/{id}', [PaymentController::class, 'terima'])->name('admin.payment.terima');
        Route::get('/payment/tolak/{id}', [PaymentController::class, 'tolak'])->name('admin.payment.tolak');
        Route::get('/cetakpdf/{id}', [TiketPDFController::class, 'cetakPDF'])->name('admin.cetakpdf');
        Route::get('/user', [UserController::class, 'index'])->name('admin.user');
        Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::resource('/riwayatwisatawan', WisatawanController::class, ['as' => 'admin']);
        Route::resource('/tiket', TiketController::class, ['as' => 'admin']);
        Route::resource('/guide', GuideController::class, ['as' => 'admin']);
        Route::resource('/kuota', ManagementKuotaController::class, ['as' => 'admin']);
    });
});

//Guide
Route::prefix('guide')->group(function () {
    Route::group(['middleware' => 'guide'], function () {
        Route::get('/dashboard', [GuideDashboardController::class, 'index'])->name('guide.dashboard');
        Route::resource('/perjalanan', PerjalananController::class, ['as' => 'guide']);
        Route::resource('/perjalananmasuk', PerjalananMasukController::class, ['as' => 'guide']);
        Route::get('/terima/{id}', [ConfirmController::class, 'terima'])->name('guide.perjalanan.terima');
        Route::get('/tolak/{id}', [ConfirmController::class, 'tolak'])->name('guide.perjalanan.tolak');
        Route::get('/riwayatperjalanan', [RiwayatPerjalananController::class, 'index'])->name('guide.perjalanan.riwayat');
    });
});

Route::resource('/myorder', MyOrderController::class);
//Wisatawan
Route::group(['middleware' => 'wisatawan'], function () {
    Route::resource('/booking', PemesananController::class);
    Route::resource('/infokuota', KuotaController::class);
    Route::get('/cetakpdf/{id}', [WisatawanTiketPDFController::class, 'cetakPDF'])->name('wisatawan.cetakpdf');
    Route::get('/order/proses/{id}', [PendakianController::class, 'showProses'])->name('myorder.show.proses');
    Route::get('/order/mendaki/{id}', [PendakianController::class, 'showMendaki'])->name('myorder.show.mendaki');
    Route::get('/order/mendaki/edit/{id}', [PendakianController::class, 'editMendaki'])->name('myorder.edit.mendaki');
    Route::post('/order/mendaki/edit/{id}', [PendakianController::class, 'updateMendaki'])->name('myorder.update.mendaki');
    Route::get('/order/selesai/{id}', [PendakianController::class, 'showSelesai'])->name('myorder.show.selesai');
    Route::get('/order/dibatalkan/{id}', [PendakianController::class, 'showDibatalkan'])->name('myorder.show.batal');
    Route::post('/rating/{id}', [RatingController::class, 'rating'])->name('booking.rating');
});
