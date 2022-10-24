<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\CekRole;
use App\Models\PenjadwalanSempro;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DosenProfilController;
use App\Http\Controllers\KonsentrasiController;
use App\Http\Controllers\PenilaianKPController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\PenjadwalanKPController;
use App\Http\Controllers\MahasiswaProfilController;
use App\Http\Controllers\PenilaianSemproController;
use App\Http\Controllers\PenilaianSkripsiController;
use App\Http\Controllers\PenjadwalanSemproController;
use App\Http\Controllers\PenjadwalanSkripsiController;
use App\Http\Controllers\StaffProfilController;

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

Route::group(['middleware' => ['guest:web,dosen,mahasiswa']], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'postlogin'])->name('login');
});

Route::group(['middleware' => ['auth:dosen,web,mahasiswa']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::group(['middleware' => ['auth:mahasiswa']], function () {
    Route::get('/profil-mhs/editpasswordmhs', [MahasiswaProfilController::class, 'editpswmhs']);
    Route::put('/profil-mhs/editpasswordmhs', [MahasiswaProfilController::class, 'updatepswmhs']);
    Route::get('/seminar', [PenjadwalanController::class, 'riwayat_mahasiswa']);    
});


Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/profil-staff/editpasswordstaff', [StaffProfilController::class, 'editpswstaff']);
    Route::put('/profil-staff/editpasswordstaff', [StaffProfilController::class, 'updatepswstaff']);

    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/create', [DosenController::class, 'create']);
    Route::post('/dosen/create', [DosenController::class, 'store']);
    Route::get('/dosen/edit/{dosen:id}', [DosenController::class, 'edit']);
    Route::put('/dosen/edit/{dosen:id}', [DosenController::class, 'update']);
    Route::delete('/dosen/{dosen:id}', [DosenController::class, 'destroy']);

    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/edit/{mahasiswa:id}', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/edit/{mahasiswa:id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{mahasiswa:id}', [MahasiswaController::class, 'destroy']);

    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/role/create', [RoleController::class, 'create']);
    Route::post('/role/create', [RoleController::class, 'store']);
    Route::get('/role/edit/{role:id}', [RoleController::class, 'edit']);
    Route::put('/role/edit/{role:id}', [RoleController::class, 'update']);
    Route::delete('/role/{role:id}', [RoleController::class, 'destroy']);

    Route::get('/prodi', [ProdiController::class, 'index']);
    Route::get('/prodi/create', [ProdiController::class, 'create']);
    Route::post('/prodi/create', [ProdiController::class, 'store']);
    Route::get('/prodi/edit/{prodi:id}', [ProdiController::class, 'edit']);
    Route::put('/prodi/edit/{prodi:id}', [ProdiController::class, 'update']);
    Route::delete('/prodi/{prodi:id}', [ProdiController::class, 'destroy']);

    Route::get('/konsentrasi', [KonsentrasiController::class, 'index']);
    Route::get('/konsentrasi/create', [KonsentrasiController::class, 'create']);
    Route::post('/konsentrasi/create', [KonsentrasiController::class, 'store']);
    Route::get('/konsentrasi/edit/{konsentrasi:id}', [KonsentrasiController::class, 'edit']);
    Route::put('/konsentrasi/edit/{konsentrasi:id}', [KonsentrasiController::class, 'update']);
    Route::delete('/konsentrasi/{konsentrasi:id}', [KonsentrasiController::class, 'destroy']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/create', [UserController::class, 'store']);
    Route::get('/user/edit/{user:id}', [UserController::class, 'edit']);
    Route::put('/user/edit/{user:id}', [UserController::class, 'update']);
    Route::delete('/user/{user:id}', [UserController::class, 'destroy']);
});

Route::group(['middleware' => ['auth:dosen']], function () {
    Route::get('/profil-dosen', [DosenProfilController::class, 'index']);
    Route::get('/profil-dosen/editfotodsn/{dosen:id}', [DosenProfilController::class, 'editfotodsn']);
    Route::put('/profil-dosen/editfotodsn/{dosen:id}', [DosenProfilController::class, 'updatefotodsn']);
    Route::get('/profil-dosen/editpassworddsn', [DosenProfilController::class, 'editpswdsn']);
    Route::put('/profil-dosen/editpassworddsn', [DosenProfilController::class, 'updatepswdsn']);
    
    Route::get('/penilaian', [PenilaianController::class, 'index']);
    Route::get('/riwayat-penilaian', [PenilaianController::class, 'riwayat']);

    Route::get('/penilaian-kp', [PenilaianKPController::class, 'index']);
    Route::get('/penilaian-kp/create/{penjadwalan_kp:id}', [PenilaianKPController::class, 'create']);
    Route::post('/penilaian-kp/create/{penjadwalan_kp:id}', [PenilaianKPController::class, 'store']);
    Route::get('/riwayat-penilaian-kp', [PenilaianKPController::class, 'riwayat']);
    Route::get('/nilai-kp/{id}', [PenjadwalanKPController::class, 'nilaikp']);
    Route::get('/perbaikan-kp/{id}', [PenjadwalanKPController::class, 'perbaikan']);

    Route::get('/penilaian-sempro', [PenilaianSemproController::class, 'index']);
    Route::get('/penilaian-sempro/create/{penjadwalan_sempro:id}', [PenilaianSemproController::class, 'create']);
    Route::post('/penilaian-sempro-pembimbing/create/{penjadwalan_sempro:id}', [PenilaianSemproController::class, 'store_pembimbing']);
    Route::post('/penilaian-sempro-penguji/create/{penjadwalan_sempro:id}', [PenilaianSemproController::class, 'store_penguji']);
    Route::get('/penilaian-sempro/edit/{penjadwalan_sempro:id}', [PenilaianSemproController::class, 'edit']);
    Route::put('/penilaian-sempro-pembimbing/edit/{penilaian_sempro_pembimbing:id}', [PenilaianSemproController::class, 'update_pembimbing']);
    Route::put('/penilaian-sempro-penguji/edit/{penilaian_sempro_penguji:id}', [PenilaianSemproController::class, 'update_penguji']);
    Route::put('/penilaian-sempro/approve/{id}', [PenjadwalanSemproController::class, 'approve']);
    Route::get('/riwayat-penilaian-sempro', [PenilaianSemproController::class, 'riwayat']);
    Route::get('/nilai-sempro/{id}', [PenjadwalanSemproController::class, 'nilaisempro']);
    Route::get('/perbaikan-sempro/{id}', [PenjadwalanSemproController::class, 'perbaikan']);
    Route::post('/revisi-naskah/create/{id}', [PenjadwalanSemproController::class, 'revisi']);

    Route::get('/penilaian-skripsi', [PenilaianSkripsiController::class, 'index']);
    Route::get('/penilaian-skripsi/create/{penjadwalan_skripsi:id}', [PenilaianSkripsiController::class, 'create']);
    Route::post('/penilaian-skripsi-pembimbing/create/{penjadwalan_skripsi:id}', [PenilaianSkripsiController::class, 'store_pembimbing']);
    Route::post('/penilaian-skripsi-penguji/create/{penjadwalan_skripsi:id}', [PenilaianSkripsiController::class, 'store_penguji']);
    Route::get('/penilaian-skripsi/edit/{penjadwalan_skripsi:id}', [PenilaianSkripsiController::class, 'edit']);
    Route::put('/penilaian-skripsi-pembimbing/edit/{penilaian_skripsi_pembimbing:id}', [PenilaianSkripsiController::class, 'update_pembimbing']);
    Route::put('/penilaian-skripsi-penguji/edit/{penilaian_skripsi_penguji:id}', [PenilaianSkripsiController::class, 'update_penguji']);    
    Route::put('/penilaian-skripsi/approve/{id}', [PenjadwalanSkripsiController::class, 'approve']);
    Route::get('/riwayat-penilaian-skripsi', [PenilaianSkripsiController::class, 'riwayat']);
    Route::get('/nilai-skripsi/{id}', [PenjadwalanSkripsiController::class, 'nilaiskripsi']);
    Route::get('/perbaikan-skripsi/{id}', [PenjadwalanSkripsiController::class, 'perbaikan']);
    Route::post('/revisi-naskah/create/{id}', [PenjadwalanSkripsiController::class, 'revisi']);
});

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/form', [PenjadwalanController::class, 'index']);
    Route::get('/riwayat-penjadwalan', [PenjadwalanController::class, 'riwayat']);    

    Route::get('/form-kp', [PenjadwalanKPController::class, 'index']);
    Route::get('/form-kp/create', [PenjadwalanKPController::class, 'create']);
    Route::post('/form-kp/create', [PenjadwalanKPController::class, 'store']);
    Route::get('/form-kp/edit/{penjadwalan_kp:id}', [PenjadwalanKPController::class, 'edit']);
    Route::put('/form-kp/edit/{penjadwalan_kp:id}', [PenjadwalanKPController::class, 'update']);
    Route::get('/riwayat-penjadwalan-kp', [PenjadwalanKPController::class, 'riwayat']);

    Route::get('/form-sempro', [PenjadwalanSemproController::class, 'index']);
    Route::get('/form-sempro/create', [PenjadwalanSemproController::class, 'create']);
    Route::post('/form-sempro/create', [PenjadwalanSemproController::class, 'store']);
    Route::get('/form-sempro/edit/{penjadwalan_sempro:id}', [PenjadwalanSemproController::class, 'edit']);
    Route::put('/form-sempro/edit/{penjadwalan_sempro:id}', [PenjadwalanSemproController::class, 'update']);
    Route::get('/riwayat-penjadwalan-sempro', [PenjadwalanSemproController::class, 'riwayat']);
    Route::get('/penilaian-sempro/riwayat-judul/{id}', [PenjadwalanSemproController::class, 'riwayatjudul']);

    Route::get('/form-skripsi', [PenjadwalanSkripsiController::class, 'index']);
    Route::get('/form-skripsi/create', [PenjadwalanSkripsiController::class, 'create']);
    Route::post('/form-skripsi/create', [PenjadwalanSkripsiController::class, 'store']);
    Route::get('/form-skripsi/edit/{penjadwalan_skripsi:id}', [PenjadwalanSkripsiController::class, 'edit']);
    Route::put('/form-skripsi/edit/{penjadwalan_skripsi:id}', [PenjadwalanSkripsiController::class, 'update']);
    Route::get('/riwayat-penjadwalan-skripsi', [PenjadwalanSkripsiController::class, 'riwayat']);
    Route::get('/penilaian-skripsi/riwayat-judul/{id}', [PenjadwalanSkripsiController::class, 'riwayatjudul']);
});

Route::group(['middleware' => ['auth:web,dosen']], function(){
    Route::get('/nilai-kp/{id}', [PenjadwalanKPController::class, 'nilaikp']);
    Route::get('/perbaikan-pengujikp/{id}/{penguji}', [PenjadwalanKPController::class, 'perbaikanpengujikp']);
    Route::get('/nilai-sempro-pembimbing/{id}/{pembimbing}', [PenjadwalanSemproController::class, 'nilaipembimbing']);
    Route::get('/nilai-sempro-penguji/{id}/{penguji}', [PenjadwalanSemproController::class, 'nilaipenguji']);
    Route::get('/nilai-skripsi-pembimbing/{id}/{pembimbing}', [PenjadwalanSkripsiController::class, 'nilaipembimbing']);
    Route::get('/nilai-skripsi-penguji/{id}/{penguji}', [PenjadwalanSkripsiController::class, 'nilaipenguji']);
    Route::get('/perbaikan-pengujisempro/{id}/{penguji}', [PenjadwalanSemproController::class, 'perbaikanpengujisempro']);
    Route::get('/perbaikan-pengujiskripsi/{id}/{penguji}', [PenjadwalanSkripsiController::class, 'perbaikanpengujiskripsi']);
    Route::get('/penilaian-sempro/cek-nilai/{id}', [PenjadwalanSemproController::class, 'ceknilai']);
    Route::get('/penilaian-skripsi/cek-nilai/{id}', [PenjadwalanSkripsiController::class, 'ceknilai']);

});

Route::group(['middleware' => ['auth:web,dosen,mahasiswa']], function(){    
    Route::get('/perbaikan-pengujikp/{id}/{penguji}', [PenjadwalanKPController::class, 'perbaikanpengujikp']);
    Route::get('/perbaikan-pengujisempro/{id}/{penguji}', [PenjadwalanSemproController::class, 'perbaikanpengujisempro']);    
    Route::get('/perbaikan-pengujiskripsi/{id}/{penguji}', [PenjadwalanSkripsiController::class, 'perbaikanpengujiskripsi']);    

});

Route::group(['middleware' => ['auth:dosen', 'cekrole:9,10,11']], function(){
    Route::get('/persetujuan-koordinator', [PenjadwalanController::class, 'persetujuan_koordinator']);    
    Route::get('/riwayat-koordinator', [PenjadwalanController::class, 'riwayat_koordinator']);    
    Route::put('/persetujuankp-koordinator/approve/{id}', [PenjadwalanKPController::class, 'approve_koordinator']);
    Route::put('/persetujuankp-koordinator/tolak/{id}', [PenjadwalanKPController::class, 'tolak_koordinator']);
    Route::put('/persetujuansempro-koordinator/approve/{id}', [PenjadwalanSemproController::class, 'approve_koordinator']);
    Route::put('/persetujuansempro-koordinator/tolak/{id}', [PenjadwalanSemproController::class, 'tolak_koordinator']);
    Route::put('/persetujuanskripsi-koordinator/approve/{id}', [PenjadwalanSkripsiController::class, 'approve_koordinator']);
    Route::put('/persetujuanskripsi-koordinator/tolak/{id}', [PenjadwalanSkripsiController::class, 'tolak_koordinator']);
});

Route::group(['middleware' => ['auth:dosen', 'cekrole:6,7,8']], function(){
    Route::get('/persetujuan-kaprodi', [PenjadwalanController::class, 'persetujuan_kaprodi']);
    Route::get('/riwayat-kaprodi', [PenjadwalanController::class, 'riwayat_kaprodi']);    
    Route::put('/persetujuankp-kaprodi/approve/{id}', [PenjadwalanKPController::class, 'approve_kaprodi']);
    Route::put('/persetujuankp-kaprodi/tolak/{id}', [PenjadwalanKPController::class, 'tolak_kaprodi']);
    Route::put('/persetujuansempro-kaprodi/approve/{id}', [PenjadwalanSemproController::class, 'approve_kaprodi']);
    Route::put('/persetujuansempro-kaprodi/tolak/{id}', [PenjadwalanSemproController::class, 'tolak_kaprodi']);
    Route::put('/persetujuanskripsi-kaprodi/approve/{id}', [PenjadwalanSkripsiController::class, 'approve_kaprodi']);
    Route::put('/persetujuanskripsi-kaprodi/tolak/{id}', [PenjadwalanSkripsiController::class, 'tolak_kaprodi']);
});
