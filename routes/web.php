<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkspedisiController;
use App\Models\Ekspedisi; // Sesuaikan dengan nama modelmu

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('ekspedisi', EkspedisiController::class);
Route::get('/cetak-laporan', function () {
    // Mengambil semua data ekspedisi beserta relasi surat dan bagiannya
    $ekspedisis = Ekspedisi::with(['surat', 'bagian'])->get();
    
    return view('laporan.cetak', compact('ekspedisis'));
})->name('cetak.laporan')->middleware('auth');

Route::get('/cetak-laporan-bagian', function () {
    // Mengambil data ekspedisi, TAPI difilter khusus untuk bagian staf yang sedang login
    // Asumsi: di tabel users kamu sudah ada kolom 'bagian_id' untuk staf
    $userBagianId = auth()->user()->bagian_id; 
    
    $ekspedisis = App\Models\Ekspedisi::with(['surat', 'bagian'])
                    ->where('bagian_id', $userBagianId)
                    ->get();
    
    return view('laporan.cetak-bagian', compact('ekspedisis'));
})->name('cetak.laporan.bagian')->middleware('auth');