<?php

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\DashboardController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Protected (HARUS LOGIN)
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cek-nik', function (Request $request) {
        $query = Pasien::where('nik', $request->nik);

        if ($request->id) {
            $query->where('id', '!=', $request->id);
        }

        return response()->json([
            'exists' => $query->exists()
        ]);
    });
        

    Route::middleware('role:admin')->group(function () {
       Route::resource('pasien', PasienController::class);
       Route::resource('obat', ObatController::class);
       Route::resource('tindakan', TindakanController::class);
       Route::resource('diagnosa', DiagnosaController::class);
       Route::resource('role', RoleController::class);
       Route::resource('user', UserController::class);
    });

    Route::middleware('role:dokter')->group(function () {
    Route::get('/dokter', function () {
        return 'Halaman Dokter';
    });
});

});
