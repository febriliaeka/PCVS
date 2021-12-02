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
Route::prefix('/secure/auth/')->name('auth.')->group(function() {
    // admin
    Route::get('/login_admin', 'LoginSetupController@form_login_admin')->name('form_login_admin');
    Route::post('/login_admin', 'LoginSetupController@login_admin')->name('login_admin');

    // healthcare_staff
    Route::get('/login_healthcare_staff', 'LoginSetupController@form_login_healthcare_staff')->name('form_login_healthcare_staff');
    Route::post('/login_healthcare_staff', 'LoginSetupController@login_healthcare_staff')->name('login_healthcare_staff');
    
    // logout
    Route::get('/logout', 'LoginSetupController@logout')->name('logout');
});

// admin - logged
Route::namespace('Admin')->prefix('/admin/')->name('admin.')->group(function() {
    // Route::middleware('IsAdmin')->group(function() {
        Route::resource('admin', 'AdminController');
        Route::get('/admin/{admin}/profile', 'AdminController@profile')->name('admin.profile');
        Route::resource('vaccine', 'VaccineController');
        Route::resource('healthcare_centre', 'HealthcareCentreController');
    // });
});

// healthcare staff - logged
Route::namespace('HealthcareStaff')->prefix('/healthcare_staff/')->name('healthcare_staff.')->group(function() {
    // Route::middleware('IsHealthcareStaff')->group(function() {
        Route::resource('healthcare_staff', 'HealthcareStaffController');
        // Route::get('/admin/{admin}/profile', 'AdminController@profile')->name('admin.profile');
    // });
});
