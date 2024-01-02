<?php

use App\Http\Controllers\Auth\AdminPhotoController;
use App\Http\Controllers\ConstitutionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionNameController;
use App\Models\Memeber;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/dashboard', HomeController::class);
    Route::put('/profile', [AdminPhotoController::class, 'update_photo'])->name('profile.admin_update_photo');

    Route::resource('/member', MemberController::class);
    Route::get('/member/fetch-members/{polling_station_id}', [MemberController::class, 'fetchsections'])->name('member.fetchPollingStation');


    Route::resource('/district', DistrictController::class);
    Route::resource('/pollingstation', PollingController::class);

    Route::get('/pollingstation/fetch-sections/{constituency_id}', [PollingController::class, 'fetchSections'])->name('pollingstation.fetch-sections');


    Route::resource('/constituency', ConstitutionController::class);
    Route::resource('/section', SectionNameController::class);

});

require __DIR__ . '/auth.php';
