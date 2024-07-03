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
    Route::post('/cases/case_registry/store', [PatientController::class, 'caseRegistry'])->name('case_registry.store');
    Route::post('/cases/treatment-lab-test/store', [PatientController::class, 'treatmentLabTest'])->name('treatment-lab-test.store');
    Route::post('/cases/medication-schedule/store', [PatientController::class, 'medicationSchedule'])->name('medication-schedule.store');
    Route::post('/cases/surgical-intervention/store', [PatientController::class, 'surgicalIntervention'])->name('surgical-intervention.store');
    Route::post('/cases/optional-questions/store', [PatientController::class, 'optionsalQuestion'])->name('optional-questions.store');
    Route::post('/cases/restriction/store', [PatientController::class, 'restriction'])->name('restriction.store');
    
    Route::get('/patient/info-profiling-tool', [PatientController::class, 'profilingTool'])->name('info-profiling-tool');
    Route::post('/blood-sugar-profiling/store', [PatientController::class, 'bloodSugarProfiling'])->name('blood-sugar-profiling.store');
    Route::post('/blood-pressure-profiling/store', [PatientController::class, 'bloodPressureProfiling'])->name('blood-pressure-profiling.store');


    Route::get('/patient/info-vaccination-record', [vaccineController::class, 'vaccinationRecord'])->name('info-vaccination-record');
    Route::post('/vaccinations/store', [vaccineController::class, 'vaccinationStore'])->name('vaccinations.store');
    Route::post('/covid-vaccine/store', [vaccineController::class, 'vaccinationCovid'])->name('covid-vaccine.store');
    Route::post('/covid-certificate/upload', [vaccineController::class, 'covidCertificate'])->name('covid-certificate.upload');
    Route::get('/covid_file_download', [vaccineController::class, 'covidFileDownload'])->name('covid_file_download');
    Route::get('/vaccinesectionthree/{id}', [vaccineController::class, 'vaccinesectionthreedownload'])->name('vaccinesectionthree');
    Route::get('/download_sectionone_file/{id}', [vaccineController::class, 'downloadSectiononeFile'])->name('download_sectionone_file');
    

    Route::get('/patient/info-random-uploader', [PatientController::class, 'randomUploaderTool'])->name('info-random-uploader');
    Route::post('/patient/random-uploader-tool/store', [PatientController::class, 'saveRandomUploaderTool'])->name('random-uploader-tool.store');
    Route::get('/download/random-uploader/{id}/tool', [PatientController::class, 'downloadRandomUploaderTool'])->name('random-uploader-tool.download');
    
    Route::get('/patient/info-doctor-appointment', [PatientController::class, 'doctorAppointMent'])->name('info-doctor-appointment');
    Route::post('/patient/info-doctor-appointment/store', [PatientController::class, 'saveDoctorAppointment'])->name('info-doctor-appointment.store');
    Route::get('/patient/info-doctor-appointment/edit', [PatientController::class, 'editDoctorAppointment'])->name('info-doctor-appointment.edit');

});

require __DIR__.'/auth.php';
