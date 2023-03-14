<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Front\BerandaController;
use App\Http\Controllers\Front\BeritaController as FrontBeritaController;
use App\Http\Controllers\Front\EventController as FrontEventController;
use App\Http\Controllers\Front\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\SponsorController;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect(url('beranda'));
});

Auth::routes();
Route::get('beranda', [BerandaController::class, 'index']);
Route::post('beranda/register', [BerandaController::class, 'register']);
Route::get('blog', [BerandaController::class, 'blog']);
Route::get('galeri', [BerandaController::class, 'galeri']);
Route::get('kontak', [BerandaController::class, 'kontak']);
Route::middleware(['auth'], ['register' => false])->group(function () {
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('admin/berita', BeritaController::class);
    Route::resource('admin/pengguna', OrganizerController::class);
    Route::resource('admin/slide-show', SlideshowController::class);
    Route::resource('admin/event', EventController::class);
    Route::resource('admin/kontak', KontakController::class);
    Route::get('admin/event/on/{id}', [EventController::class, 'on'])->name('event.on');
    Route::get('admin/event/off/{id}', [EventController::class, 'off'])->name('event.off');
    Route::resource('admin/kategori', KategoriController::class);
    Route::get('admin/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
    Route::get('admin/peserta', [PesertaController::class, 'index'])->name('peserta');
    Route::get('admin/sponsor', [SponsorController::class, 'index'])->name('sponsor');
    Route::get('admin/profile', [HomeController::class, 'profile']);
    Route::post('admin/profile/set-password', [HomeController::class, 'setPassword'])->name('home.set-password');
    Route::post('admin/profile/set-profile', [HomeController::class, 'setProfile'])->name('home.set-profile');
    Route::post('admin/profile/set-gambar', [HomeController::class, 'setGambar'])->name('home.set-gambar');
    Route::get('admin/kontak/on/{id}', [KontakController::class, 'on'])->name('kontak.on');
    Route::get('admin/kontak/off/{id}', [KontakController::class, 'off'])->name('kontak.off');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
