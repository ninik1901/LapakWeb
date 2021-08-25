<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/pengguna/register', 'AuthApiController@register');
Route::post('/pengguna/login', 'AuthApiController@login');
Route::post('/pengguna/reset', 'AuthApiController@reset');
Route::post('/pengguna/logout', 'AuthApiController@logout');

Route::get('/tampil_buku', 'BukuApiController@tampilBuku');
Route::get('/tampil_ebook', 'EbookApiController@tampilEbook');
Route::get('/tampil_lapak', 'LapakApiController@tampilLapak');
Route::post('/donasi_buku', 'DonasiApiController@donasiBuku');
Route::post('/pengajuan_buku', 'DonasiApiController@pengajuanBuku');
Route::post('/pengajuan_ebook', 'DonasiApiController@pengajuanEbook');
Route::post('/donasi_ebook', 'DonasiApiController@donasiEbook');
Route::post('/tambah_baca', 'EbookApiController@tambahBaca');
Route::post('/daftar_simpan', 'SimpanEbookApiController@daftarSimpan');
Route::post('/tampil_user', 'PenggunaApiController@tampilUser');
Route::post('/ubah_profiluser', 'PenggunaApiController@ubahProfilUser');
Route::get('/info_donasiebook', 'DonasiApiController@infoDonasiebook');
Route::get('/info_donasibuku', 'DonasiApiController@infoDonasibuku');
Route::post('/info_donasipengguna', 'DonasiApiController@infoDonasipengguna');
Route::post('/upRelawan', 'RelawanApiController@upRelawan');
Route::get('/tampil_jeniskategori', 'EbookApiController@tampilJenisKategori');
Route::get('/tampil_kategoriebook', 'EbookApiController@tampilKategoriEbook');
Route::get('/tampil_ebookbaru', 'EbookApiController@tampilEbookBaru');
Route::post('/tampil_simpan', 'SimpanEbookApiController@tampilSimpan');