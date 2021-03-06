<?php

use App\Models\Profil;
use App\Models\PeralatanTersedia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KcdController;
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
use App\Http\Controllers\BangunanController;
use App\Http\Controllers\KompetenController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\SpektrumController;
use App\Http\Controllers\VisitasiController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\ProfilKcdController;
use App\Http\Controllers\ProfilDepoController;
use App\Http\Controllers\RehabRenovController;
use App\Http\Controllers\UsulanFotoController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\HasilVisitasiController;
use App\Http\Controllers\JenisPimpinanController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UsulanBangunanController;
use App\Http\Controllers\UnsurVerifikasiController;
use App\Http\Controllers\UsulanPeralatanController;
use App\Http\Controllers\BidangKompetensiController;
use App\Http\Controllers\JenisLaboratoriumController;
use App\Http\Controllers\PeralatanTersediaController;
use App\Http\Controllers\ProgramKompetensiController;
use App\Http\Controllers\Lahan_sekolah\LahanController;
use App\Http\Controllers\JenisLaboratoriumKomlisController;
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



// |-------------------------------------------------------------------------- SEMENTARA |--------------------------------------------------------------------------
// Route::get('gallery', function () {
//     return view('profil.gallery');
// });

// Route::get('/lab', function () {
//     return view('lab.index');
// });
// Route::get('/detail', function () {
    
// });

// Route::get('/detail-lab', function () {
    
// });

// Route::get('forgot', function () {
//     return view('myauth.resetPassword');
// });


// Route::get('forgot', function () {
//     return view('myauth.resetPassword');

// Route::get('detail', function () {
//     return view('bangunan.praktik.show');
// });

// Route::get('reset-password', function () {
//     return view('myauth.resetPassword');
// });

// Route::get('forgot', function () {
//     return view('myauth.forgot-password');
// });

// Route::get('admin-monitoringvertifikator', function () {
//     return view('admin.monitoringvertif');
// });

// Route::get('admin-detailmonitoring', function () {
//     return view('admin.monitoring');
// });

// Route::get('/riwayat-bantuan-dinas/{id}', function () {
//     return view('admin.detail-riwayat');
// });



// |-------------------------------------------------------------------------- /SEMENTARA |--------------------------------------------------------------------------

Route::group(['middleware' => ['auth']], function() {
    Route::get('upload-logo', function () {
        return view('myauth.uploadLogo');
    });
    Route::get('user-settings', [RegisteredUserController::class, 'userSettings']);
    Route::patch('/ubah-logo', [RegisteredUserController::class, 'ubah_foto']);
    Route::patch('/ubah-email-admin', [RegisteredUserController::class, 'ubah_email']);

    // admin
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/profil/admin', [AdminController::class, 'search']);
    Route::resource('/profil', ProfilController::class);
    Route::get('/lahan-dinas', [UsulanLahanController::class, 'lahanDinas']);
    // Route::get('/bangunan/ruang-kelas-dinas', [KelasController::class, 'showDinas']);
    // Route::get('/bangunan/lab-komputer-dinas', [KomputerController::class, 'showDinas']);
    // Route::get('/bangunan/perpustakaan-dinas', [PerpustakaanController::class, 'showDinas']);
    // Route::get('/bangunan/toilet-dinas', [ToiletController::class, 'showDinas']);
    // Route::get('/bangunan/ruang-pimpinan-dinas', [PimpinanController::class, 'showDinas']);
    Route::get('/bangunan/rehab-renov-dinas', [RehabRenovController::class, 'showDinas']);
    // Route::get('/bangunan/ruang-praktik-dinas', [PraktikController::class, 'showDinas']);
    Route::get('/riwayat-bantuan-dinas', [RiwayatController::class, 'showDinas']);
    Route::get('/visitasi-list', [VisitasiController::class, 'allVisitasi']);
    Route::resource('/komli', KomliController::class);
    Route::resource('/unsur-verifikasi', UnsurVerifikasiController::class);
    Route::resource('/bidang-kompetensi', BidangKompetensiController::class);
    Route::resource('/program-kompetensi', ProgramKompetensiController::class);
    Route::resource('/profil-kcd', ProfilKcdController::class);
    Route::resource('/cadisdik', KcdController::class);
    Route::resource('/spektrum', SpektrumController::class);
    Route::resource('/profil-kcd', ProfilKcdController::class);
    Route::resource('/visitasi', VisitasiController::class);
    Route::patch('/visitasi-publish', [VisitasiController::class, 'visitasiPublish']);
    Route::get('/visitasi-sekolah', [VisitasiController::class, 'visitasiSekolah']);
    Route::resource('/hasil-visitasi', HasilVisitasiController::class);
    Route::resource('/jenis-laboratorium', JenisLaboratoriumController::class);
    Route::resource('/jenis-laboratorium-komli', JenisLaboratoriumKomlisController::class);
    Route::delete('/jenis-laboratorium-komli-delete', [JenisLaboratoriumKomlisController::class, 'destroy']);
    Route::patch('/hasil-visitasi-update', [HasilVisitasiController::class, 'update']);
    // Route::resource('/visitasi', VisitasiController::class);
    Route::resource('roles', RoleController::class); 
    Route::resource('users', RegisteredUserController::class);
    



    // sekolah
    Route::patch('/kompeten/tambahsiswa/{id:profil}', [KompetenController::class, 'update']);
    Route::resource('/kompeten', KompetenController::class);
    Route::get('/kompeten/create/{id:profil}', [KompetenController::class, 'create']);
    Route::patch('/kompeten/update-ketersediaan/{id}', [KompetenController::class, 'updateKetersediaan']);
    Route::patch('/kompeten/update-kekurangan/{id}', [KompetenController::class, 'updateKekurangan']);
    Route::patch('/kompeten/update-kondisi-ideal-ruang/{id}', [KompetenController::class, 'updateKondisiIdealRuang']);
    Route::patch('/kompeten/update-kondisi-ideal-lahan/{id}', [KompetenController::class, 'updateKondisiIdealLahan']);
    Route::patch('/kompeten/upload-logo/{id}', [KompetenController::class, 'uploadLogo']);
    Route::patch('/kompeten/tambah-keterangan/{id}', [KompetenController::class, 'tambahKeterangan']);
    Route::patch('/koleksi/update-koleksi', [KoleksiController::class, 'update']);
    Route::get('/koleksi/create/{id:profil}', [KoleksiController::class, 'create']);
    Route::resource('/koleksi', KoleksiController::class);
    Route::resource('/foto', FotoController::class);
    Route::get('/foto/create/{koleksi:slug}', [FotoController::class, 'create']);
    Route::delete('/foto/delete-sigle-foto/{id}', [UsulanFotoController::class, 'sigleDelete']);
    Route::delete('/foto/delete-sigle-foto-rehab-renov/{id}', [UsulanFotoController::class, 'sigleDeleteRehab']);
    Route::resource('/lahan', LahanController::class);
    Route::resource('/usulan-lahan', UsulanLahanController::class);
    Route::resource('/ketersediaan-lahan', KetersediaanLahanController::class);
    Route::patch('/kekurangan-lahan/update-kekurangan', [KekuranganLahanController::class, 'update']);
    Route::resource('/kekurangan-lahan', KekuranganLahanController::class);
    Route::resource('/bangunan-all', BangunanController::class);
    Route::patch('/bangunan-all/update-ketersediaan/{id}', [BangunanController::class, 'ubahKetersediaan']);
    Route::patch('/bangunan-all/update-kekurangan/{id}', [BangunanController::class, 'ubahKekurangan']);
    Route::patch('/bangunan-all/update-kondisi-ideal/{id}', [BangunanController::class, 'kondisiIdeal']);
    Route::get('/bangunan', [BangunanController::class, 'bangunan']);
    

    Route::resource('/bangunan/ruang-kelas', KelasController::class);
    Route::post('/bangunan/usulan-ruang-kelas', [KelasController::class, 'createusulan']);
    Route::resource('/bangunan/ruang-praktik', PraktikController::class);
    Route::patch('/bangunan/ruang-praktik', [PraktikController::class, 'update']);
    Route::post('/bangunan/usulan-ruang-praktik', [PraktikController::class, 'createusulan']);
    Route::resource('/bangunan/lab-komputer', KomputerController::class);
    Route::post('/bangunan/usulan-lab-komputer', [KomputerController::class, 'createusulan']);
    Route::resource('/bangunan/ruang-perpustakaan', PerpustakaanController::class);
    Route::post('/bangunan/usulan-ruang-perpustakaan', [PerpustakaanController::class, 'createusulan']);
    Route::resource('/bangunan/toilet', ToiletController::class);
    Route::post('/bangunan/usulan-toilet', [ToiletController::class, 'createusulan']);
    Route::resource('/bangunan/ruang-rehabrenov', RehabRenovController::class);
    Route::resource('/bangunan/penunjang', PimpinanController::class);
    Route::post('/bangunan/usulan-ruang-penunjang', [PimpinanController::class, 'createusulan']);
    Route::patch('/bangunan/penunjang', [PimpinanController::class, 'update']);
    Route::get('/bangunan/usulan/{id}/edit', [UsulanBangunanController::class, 'editPimpinan']);
    Route::patch('/bangunan/usulan/{id}', [UsulanBangunanController::class, 'updatePimpinan']);
    Route::resource('/bangunan/laboratorium', LaboratoriumController::class);
    Route::post('/bangunan/usulan-laboratorium', [LaboratoriumController::class, 'createusulan']);



    Route::resource('/jenis-penunjang', JenisPimpinanController::class);
    Route::resource('/monitoring', MonevController::class);
    Route::get('/peralatan-sekolah/{id}', [PeralatanController::class, 'showPeralatan']);
    Route::resource('/peralatan', PeralatanController::class);
    Route::resource('/peralatan-tersedia', PeralatanTersediaController::class);
    Route::resource('/usulan-peralatan', UsulanPeralatanController::class);
    Route::resource('/ketersediaan-peralatan', PeralatanTersedia::class);
    Route::resource('/riwayat-bantuan', RiwayatController::class);
    Route::resource('/usulan-bangunan', UsulanBangunanController::class);
});

require __DIR__.'/auth.php';