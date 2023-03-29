<?php

use App\Http\Controllers\adminController;
use App\Models\daftarakad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\akadController;
use App\Http\Controllers\authController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penghuluController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Route::get('login', [loginController::class, 'login'])->name('login');
Route::post('login', [loginController::class, 'proseslogin'])->name('proseslogin')->middleware('throttle:login');
Route::get('register', [loginController::class, 'register'])->name('register');
Route::post('register', [loginController::class, 'prosesregister']);
Route::post('logout', [loginController::class, 'logout'])->name('logout');
Route::get('/email/verify', function () {
    return redirect('login')->with('loginError', 'Silahkan Verifikasi Akun');
})->middleware('auth:web')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard-user');
})->middleware(['auth:web', 'signed'])->name('verification.verify');

Route::get('/dashboard-user', function () {
    return view('layouts.dashboard');
})->middleware(['auth:web', 'verified', 'auth.banned']);

Route::group(['middleware' => ['auth', 'admin:user', 'auth.banned']], function() {
    route::resource('daftarAkad', akadController::class);
    route::get('syaratakad', [akadController::class, 'syaratakad'])->name('syaratakad');
    route::post('akad', [akadController::class, 'akad']);
    route::get('akunuser/{id}', [akadController::class, 'akunuser']);
    
    route::post('/prosesakunuser/{id}', [akadController::class, 'prosesakunuser']);
    route::get('user_edit/{id}', [akadController::class, 'user_edit']);
    route::post('proses_edit_users/{id}', [akadController::class, 'proses_edit_users']);
    route::get('report', [akadController::class, 'report']);
    route::get('reportuser/{id}', [akadController::class, 'reportuser']);
});
route::get('/', [loginController::class, 'index2']);
// lupa password
Route::post('forgot-password', [authController::class, 'proses_password_baru'])->middleware('guest')->name('password.email');
Route::get('/forgot-password', [authController::class, 'forgot_password'])->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', [authController::class, 'resset_password'])->middleware('guest')->name('password.reset');
route::post('/reset-password', [authController::class, 'reset'])->middleware('guest')->name('password.update');

route::get('admin', [adminController::class, 'admin'])->middleware('auth:admin')->name('adminkua');
route::group(['middleware' => ['auth:admin', 'admin:admin']], function() {
    route::get('user', [adminController::class, 'user']);
    route::get('datasuami', [adminController::class, 'datasuami']);
    route::get('penghulu', [adminController::class, 'penghulu'])->name('penghulu');
    route::resource('/kua', penghuluController::class);
    route::get('exportPenghulu', [penghuluController::class, 'exportPenghulu']);
    route::post('importPenghulu', [penghuluController::class, 'importPenghulu']);

    //suami 

    route::get('hapus_suami/{id}/{user_id}', [adminController::class, 'hapus_suami']);
    route::get('edit_suami/{id}/edit', [adminController::class, 'edit_suami']);
    route::post('/proses_update_suami/{id}', [adminController::class, 'proses_update_suami']);
    route::get('/exportSuami', [adminController::class, 'exportSuami']);
    
    //istri
    route::get('dataistri', [adminController::class, 'dataistri']);
    route::get('edit_istri/{id}/edit', [adminController::class, 'edit_istri']);
    route::post('/proses_update_istri/{id}', [adminController::class, 'proses_update_istri']);
    route::get('hapus_istri/{id}/{user_id}', [adminController::class, 'hapus_istri']);
    route::get('exportIstri', [adminController::class, 'exportIstri']);

    //akad
    route::get('akad_admin', [adminController::class, 'akad_admin']);
    route::get('akadExport', [adminController::class, 'akadExport']);
    route::get('hapusakaduser/{id}/{user_id}', [akadController::class, 'hapusakad']);
    route::get('editakaduser/{id}/edit', [akadController::class, 'editakaduser']);
    route::post('edit_akad_admin', [akadController::class, 'proses_edit_akad']);
    route::get('updateakaduser/{id}/{user_id}', [akadController::class, 'updateakaduser']);
    //user registration

    route::get('/user', [authController::class, 'user']);
    route::get('/edit-user/{id}/edit', [authController::class, 'edit_user']);
    route::post('proses_update_user/{id}', [authController::class, 'update_user']);
    route::get('hapus-user/{id}', [authController::class, 'hapus_user']);
    route::get('ban-user/{id}', [authController::class, 'ban_user']);
    route::post('proses_banned_user/{id}', [authController::class, 'proses_banned']);
    route::get('exportUser', [authController::class, 'exportUser']);

    //list aakun banned
    route::get('listakunbanned', [authController::class, 'listakunbanned']);
    route::get('unban/{id}', [authController::class, 'unban']);
});