<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;
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
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

/**-------------------------------------------------------------------------
 * KEY : PATIENT REGISTATION PART
 * -------------------------------------------------------------------------
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/patient/info-general', [PatientController::class, 'generalProfile'])->name('info-general');
    Route::get('/patient/info-general', [PatientController::class, 'generalProfile'])->name('info-general');

    Route::post('/sensitive-information', [PatientController::class, 'sensitiveInformation'])->name('sensitive-information.store');
    Route::post('/genetic-disease-profile', [PatientController::class, 'geneticDiseaseProfile'])->name('genetic-disease-profile.store');
    Route::post('/other-personal-information', [PatientController::class, 'otherPersonalInformation'])->name('personal-information.store');
    
    
    Route::post('/blood-sugar.store', [PatientController::class, 'bloodSugarProfiling'])->name('blood-sugar.store');
    Route::post('/blood-pressure.store', [PatientController::class, 'bloodPressureProfiling'])->name('blood-pressure.store');


    Route::get('/patient/info-cases', [PatientController::class, 'cases'])->name('info-cases');
    Route::get('/patient/info-profiling-tool', [PatientController::class, 'profilingTool'])->name('info-profiling-tool');
    
    Route::get('/patient/info-vaccination-record', [PatientController::class, 'vaccinationRecord'])->name('info-vaccination-record');
    Route::post('/patient/vaccinations/store', [PatientController::class, 'saveVaccinations'])->name('vaccinations.store');
    
    Route::get('/patient/info-random-uploader', [PatientController::class, 'randomUploaderTool'])->name('info-random-uploader');
    Route::post('/patient/random-uploader-tool/store', [PatientController::class, 'saveRandomUploaderTool'])->name('random-uploader-tool.store');
});

require __DIR__.'/auth.php';
