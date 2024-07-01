<?php

use App\Http\Controllers\AppointController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\vaccineController;
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
Route::get('/patient/info-general', [PatientController::class, 'generalProfile'])->name('info-general');
Route::post('/patient-registry/store', [PatientController::class, 'patientRegistry'])->name('patient-registry.store');

Route::group(['middleware' => ['auth']], function() {

    Route::post('/sensitive-information', [PatientController::class, 'sensitiveInformation'])->name('sensitive-information.store');
    Route::post('/genetic-disease-profile', [PatientController::class, 'geneticDiseaseProfile'])->name('genetic-disease-profile.store');
    Route::post('/other-personal-information', [PatientController::class, 'otherPersonalInformation'])->name('personal-information.store');
    
    Route::get('/patient/info-cases', [PatientController::class, 'cases'])->name('info-cases');
    Route::post('/patient/case_registry/store', [PatientController::class, 'caseRegistry'])->name('case_registry.store');
    Route::post('/patient/treatment-lab-test/store', [PatientController::class, 'treatmentLabTest'])->name('treatment-lab-test.store');
    
    Route::get('/patient/info-profiling-tool', [PatientController::class, 'profilingTool'])->name('info-profiling-tool');
    Route::post('/blood-sugar-profiling/store', [PatientController::class, 'bloodSugarProfiling'])->name('blood-sugar-profiling.store');
    Route::post('/blood-pressure-profiling/store', [PatientController::class, 'bloodPressureProfiling'])->name('blood-pressure-profiling.store');


    
    Route::get('/patient/info-vaccination-record', [vaccineController::class, 'vaccinationRecord'])->name('info-vaccination-record');
    Route::post('/patient/vaccinations/store', [vaccineController::class, 'saveVaccinations'])->name('vaccinations.store');
    Route::get('/get_section_one_data', [vaccineController::class, 'getSectionOneData'])->name('get_section_one_data');
    Route::get('/get_section_two_data', [vaccineController::class, 'getSectionTwoData'])->name('get_section_two_data');
    Route::get('/get_section_three_data', [vaccineController::class, 'getSectionThreeData'])->name('get_section_three_data');
    Route::post('/store_covid_19_vaccine', [vaccineController::class, 'storeCovid19Vaccine'])->name('store_covid_19_vaccine');
    Route::post('/store_covid_file_upload', [vaccineController::class, 'storeCovidFileUpload'])->name('store_covid_file_upload');
    

    Route::get('/patient/info-random-uploader', [PatientController::class, 'randomUploaderTool'])->name('info-random-uploader');
    Route::post('/patient/random-uploader-tool/store', [PatientController::class, 'saveRandomUploaderTool'])->name('random-uploader-tool.store');
    
    Route::get('/patient/info-doctor-appointment', [AppointController::class, 'doctorAppointMent'])->name('info-doctor-appointment');
    Route::post('/patient/info-doctor-appointment/store', [AppointController::class, 'saveDoctorAppointment'])->name('info-doctor-appointment.store');
    Route::get('/patient/info-doctor-appointment/edit', [AppointController::class, 'editDoctorAppointment'])->name('info-doctor-appointment.edit');

});

require __DIR__.'/auth.php';
