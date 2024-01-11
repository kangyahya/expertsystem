<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\pakar\PakarController as Pakar;
use App\Http\Controllers\IkanController as Ikan;
use App\Http\Controllers\GejalaController as Gejala;
use App\Http\Controllers\PenyakitController as Penyakit;
use App\Http\Controllers\AturanController as Aturan;
use App\Http\Controllers\SpeciesController as Specie;
use App\Http\Controllers\LaporanController as Laporan;
use App\Http\Controllers\FormulirController as Formulir;
use App\Http\Controllers\DiagnosaController as Diagnosa;
use App\Http\Controllers\UsersController as Users;

Route::get('/', [LoginBasic::class,'login']);
Route::group(['middleware' => 'auth'],function (){
    Route::resource('/users', Users::class);
    Route::get('/data-pakar',[Pakar::class,'index'])->name('data-pakar');
    Route::resource('/data-species', Specie::class);
    Route::get('trash/data-species',[Specie::class,'trash'])->name('trash.data-species.index');
    Route::patch('data-species/restore/{id}',[Specie::class,'restore'])->name('trash.data-species.restore');
    Route::delete('data-species/force-delete/{id}',[Specie::class,'forceDelete'])->name('trash.data-species.force');

    Route::resource('/data-ikan', Ikan::class);
    Route::get('trash/data-ikan',[Ikan::class,'trash'])->name('trash.data-ikan.index');
    Route::patch('data-ikan/restore/{id}',[Ikan::class,'restore'])->name('trash.data-ikan.restore');
    Route::delete('data-ikan/force-delete/{id}',[Ikan::class,'forceDelete'])->name('trash.data-ikan.force');

    Route::resource('/data-penyakit', Penyakit::class);
    Route::get('trash/data-penyakit',[Penyakit::class,'trash'])->name('trash.data-penyakit.index');
    Route::patch('data-penyakit/restore/{id}',[Penyakit::class,'restore'])->name('trash.data-penyakit.restore');
    Route::delete('data-penyakit/force-delete/{id}',[Penyakit::class,'forceDelete'])->name('trash.data-penyakit.force');

    Route::resource('/data-gejala', Gejala::class);
    Route::get('trash/data-gejala',[Gejala::class,'trash'])->name('trash.data-gejala.index');
    Route::patch('data-gejala/restore/{id}',[Gejala::class,'restore'])->name('trash.data-gejala.restore');
    Route::delete('data-gejala/force-delete/{id}',[Gejala::class,'forceDelete'])->name('trash.data-gejala.force');

    Route::resource('/data-aturan', Aturan::class);
    Route::get('trash/data-aturan',[Aturan::class,'trash'])->name('trash.data-aturan.index');
    Route::patch('data-aturan/restore/{id}',[Aturan::class,'restore'])->name('trash.data-aturan.restore');
    Route::delete('data-aturan/force-delete/{id}',[Aturan::class,'forceDelete'])->name('trash.data-aturan.force');

    Route::resource('/laporan', Laporan::class);
    Route::get('generate/laporan', [Laporan::class,'generatePDF'])->name('laporan.cetak');
    Route::resource('/formulir',Formulir::class);
    Route::get('export/formulir',[Formulir::class,'export'])->name('formulir.export');
    Route::resource('/diagnosa', Diagnosa::class);
    Route::post('/diagnosa/simpan',[Diagnosa::class,'simpan'])->name('diagnosa.simpan');
});

Route::controller(LoginBasic::class)->group(function() {
  Route::post('/store', 'store')->name('store');
  Route::get('/login', 'login')->name('login');
  Route::post('/authenticate', 'authenticate')->name('authenticate');
  Route::get('/logout', 'logout')->name('logout');
});
