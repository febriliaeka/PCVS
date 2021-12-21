<?php

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
    if(auth()->guard('admin')->check()){
        return redirect()->route('admin.admin.index');
    }else{
        return view('home.index');
        // return redirect()->route('auth.form_login_admin');
    }
});

// AUTH ADMIN
Route::prefix('/secure/auth')->name('auth.')->group(function() {
    // admin
    Route::get('/login_admin', 'LoginSetupController@form_login_admin')->name('form_login_admin');
    Route::post('/login_admin', 'LoginSetupController@login_admin')->name('login_admin');

    // healthcare_staff
    Route::get('/login_healthcare_staff', 'LoginSetupController@form_login_healthcare_staff')->name('form_login_healthcare_staff');
    Route::post('/login_healthcare_staff', 'LoginSetupController@login_healthcare_staff')->name('login_healthcare_staff');

    // patient
    Route::get('/login_patient', 'LoginSetupController@form_login_patient')->name('form_login_patient');
    Route::post('/login_patient', 'LoginSetupController@login_patient')->name('login_patient');
    
    // logout
    Route::get('/logout', 'LoginSetupController@logout')->name('logout');

    Route::prefix('/register')->name('register.')->group(function() {
        // admin
        Route::get('/admin', 'RegisterController@form_register_admin')->name('form_admin');
        Route::post('/admin', 'RegisterController@register_admin')->name('admin');
    
        // healthcare_staff
        Route::get('/healthcare_staff', 'RegisterController@form_register_healthcare_staff')->name('form_healthcare_staff');
        Route::post('/healthcare_staff', 'RegisterController@register_healthcare_staff')->name('healthcare_staff');
    
        // patient
        Route::get('/patient', 'RegisterController@form_register_patient')->name('form_patient');
        Route::post('/patient', 'RegisterController@register_patient')->name('patient');
        
    });
});

// admin - logged
Route::namespace('Admin')->prefix('/admin')->name('admin.')->group(function() {
    // Route::middleware('IsAdmin')->group(function() {
        Route::resource('admin', 'AdminController');
        Route::get('/admin/{admin}/profile', 'AdminController@profile')->name('admin.profile');
        Route::resource('vaccine', 'VaccineController');
        Route::resource('healthcare_centre', 'HealthcareCentreController');
        Route::resource('healthcare_staff', 'HealthcareStaffController');
        Route::resource('vaccine_batch', 'VaccineBatchController');
        Route::resource('patient', 'PatientController');
        Route::resource('vaccine_patient', 'VaccinePatientController');
    // });
});

// healthcare staff - logged
Route::namespace('HealthcareStaff')->prefix('/healthcare_staff')->name('healthcare_staff.')->group(function() {
    // Route::middleware('IsHealthcareStaff')->group(function() {
        Route::resource('healthcare_staff', 'HealthcareStaffController');
        // Route::get('/admin/{admin}/profile', 'AdminController@profile')->name('admin.profile');
        Route::resource('vaccine_batch', 'VaccineBatchController');
        Route::resource('patient', 'PatientController');
        Route::resource('vaccine_patient', 'VaccinePatientController');
        // });
    });

// patient - logged
Route::namespace('Patient')->prefix('/patient')->name('patient.')->group(function() {
    // Route::middleware('IsHealthcareStaff')->group(function() {
        Route::resource('patient', 'PatientController');
        Route::get('vaccine_patient_vaccine_list', 'VaccinePatientController@index_vaccine')->name('vaccine_patient.index_vaccine');
        Route::get('vaccine_patient_centre_list/{vaccine_id}', 'VaccinePatientController@index_centre')->name('vaccine_patient.index_centre');
        Route::get('vaccine_patient_create/{vaccine_batch_id}', 'VaccinePatientController@create')->name('vaccine_patient.form_create');
        Route::resource('vaccine_patient', 'VaccinePatientController');
        // Route::get('/admin/{admin}/profile', 'AdminController@profile')->name('admin.profile');
    // });
});