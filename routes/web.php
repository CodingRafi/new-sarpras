<?php

use App\Models\Profil;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KomliController;
use App\Http\Controllers\MonevController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ToiletController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\KompetenController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\ProfilDepoController;
use App\Http\Controllers\RehabRenovController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UsulanBangunanController;
use App\Http\Controllers\Lahan_sekolah\LahanController;
use App\Http\Controllers\Lahan_sekolah\UsulanLahanController;
use App\Http\Controllers\Bangunan\Ruang_kelas\KelasController;
use App\Http\Controllers\Lahan_sekolah\KekuranganLahanController;
use App\Http\Controllers\Bangunan\Ruang_praktek\PraktikController;
use App\Http\Controllers\Lahan_sekolah\KetersediaanLahanController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// |-------------------------------------------------------------------------- SEMENTARA |--------------------------------------------------------------------------
Route::get('gallery', function () {
    return view('profil.gallery');
});

Route::get('detail', function () {
    return view('bangunan.praktik.show');
});

Route::get('upload-logo', function () {
    return view('myauth.uploadLogo');
});

Route::get('reset-password', function () {
    return view('myauth.resetPassword');
});

Route::get('edit-ruangpraktik', function () {
    return view('bangunan.praktik.edit');
});

Route::get('edit-ruangperpustakaan', function () {
    return view('bangunan.perpustakaan.edit');
});

Route::get('edit-ruangpimpinan', function () {
    return view('bangunan.pimpinan.edit');
});

Route::get('edit-rehabrenov', function () {
    return view('bangunan.rehabrenov.edit');
});

Route::get('edit-usulan-peralatan', function () {
    return view('peralatan.edit');
});
// |-------------------------------------------------------------------------- /SEMENTARA |--------------------------------------------------------------------------

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', RegisteredUserController::class);
    Route::get('/profil/admin', [AdminController::class, 'index']);
    Route::resource('/profil', ProfilController::class);
    Route::patch('/kompeten/tambahsiswa/{id:profil}', [KompetenController::class, 'update']);
    Route::resource('/kompeten', KompetenController::class);
    Route::get('/kompeten/create/{id:profil}', [KompetenController::class, 'create']);
    Route::resource('/koleksi', KoleksiController::class);
    Route::get('/koleksi/create/{id:profil}', [KoleksiController::class, 'create']);
    Route::patch('/koleksi/update-koleksi', [KoleksiController::class, 'update']);
    Route::resource('/foto', FotoController::class);
    Route::get('/foto/create/{koleksi:slug}', [FotoController::class, 'create']);
    Route::resource('/lahan', LahanController::class);
    Route::resource('/usulan-lahan', UsulanLahanController::class);
    Route::resource('/ketersediaan-lahan', KetersediaanLahanController::class);
    Route::patch('/kekurangan-lahan/update-kekurangan', [KekuranganLahanController::class, 'update']);
    Route::resource('/kekurangan-lahan', KekuranganLahanController::class);
    Route::resource('/bangunan/ruang-kelas', KelasController::class);
    Route::post('/bangunan/usulan-ruang-kelas', [KelasController::class, 'createusulan']);
    Route::delete('/bangunan/usulan-ruang-kelas/{id}', [KelasController::class, 'deleteusulan']);
    Route::resource('/bangunan/ruang-praktik', PraktikController::class);
    Route::post('/bangunan/usulan-ruang-praktik', [PraktikController::class, 'createusulan']);
    Route::delete('/bangunan/usulan-ruang-praktik/{id}', [PraktikController::class, 'deleteusulan']);
    Route::resource('/bangunan/lab-komputer', KomputerController::class);
    Route::resource('/bangunan/ruang-perpustakaan', PerpustakaanController::class);
    Route::resource('/bangunan/ruang-rehabrenov', RehabRenovController::class);
    Route::resource('/bangunan/toilet', ToiletController::class);
    Route::resource('/bangunan/pimpinan', PimpinanController::class);
    Route::resource('/monev', MonevController::class);
    Route::resource('/peralatan/nama-jurusan', PeralatanController::class);
    Route::resource('/riwayat-bantuan', RiwayatController::class);
});

require __DIR__.'/auth.php';
