<?php

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



Route::redirect('/', '/home', 302);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
 * @package App\Http\Controllers\Authenticate
 */
Route::namespace('Authenticate')->group(function () {
  /**
   * @see Registration
   */
  Route::get('register', 'RegisterController@registerForm')->name('register-form');
  Route::post('register', 'RegisterController@register')->name('register');

  /**
   * @see Login
   */
  Route::get('login', 'LoginController@loginForm')->name('login-form');
  Route::post('login', 'LoginController@authenticate')->name('login');


});

/**
 * @package App\Http\Controllers\Precamp
 */
Route::namespace('Precamp')->name('precamp.')->prefix('precamp')->group(function () {

  /**
   * @see Change Password
   */
  Route::get('/change-password', 'DashboardController@changepassword')->name('changepassword');
  Route::post('/password', 'DashboardController@postCredentials')->name('postCredentials');

  /**
   * @package App\Http\Controllers\Precamp\DashboardController
   */
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');
  Route::get('add/patients', 'DashboardController@addPatient')->name('addpatients');
  Route::get('select-district/{district?}', 'DashboardController@selectDistrict')
  ->name('district');

  /**
   * @see Change Password
   */
   Route::get('add-users', 'DashboardController@users')->name('users');
   Route::post('add/users', 'DashboardController@addUsers')->name('addusers');

  });

  Route::namespace('Precamp')->name('camp.')->prefix('camp')->group(function () {

    /**
     * @see Camp Creation
     */
    Route::get('dashboard', 'CampController@index')->name('dashboard');
    Route::get('user/{role}', 'CampController@user')->name('user');
    Route::get('create', 'CampController@create')->name('create');
    Route::post('store', 'CampController@store')->name('store');

    /**
     * @see Camp Venue, Doctor, Organizer form
     */
    Route::get('/{camp}/camp-details', 'CampController@campDetails')->name('campdetails');


    /**
     * @see Camp Venue, Doctor, Organizer create
     */
    Route::get('/{camp}/{page}/details', 'CampController@campPage')->name('page');
    Route::post('/{camp}/create/{create}', 'CampController@createCamp')->name('createcamp');

    /**
     * @see Camp Venue update and selected
     */

    Route::post('/{venue}/venue-update', 'CampController@venueUpdate')->name('venueupdate');
    Route::get('/{venue}/venue-selected', 'CampController@venueSelected')->name('venueselected');

    /**
     * @see Camp Doctor update and selected
     */
   Route::post('/{doctor}/doctor-update', 'CampController@doctorUpdate')
   ->name('doctorupdate');
   Route::get('/{doctor}/doctor-selected', 'CampController@doctorSelected')
   ->name('doctorselected');

   /**
    * @see Camp Travel, Accomodation, Food organizers update and selected
    */
  Route::post('/{organizer}/organizer-update', 'CampController@organizerUpdate')
  ->name('organizerupdate');
  Route::get('/{organizer}/organizer-selected', 'CampController@organizerSelected')
  ->name('organizerselected');

  Route::get('/{organizer}/organizer-unselected', 'CampController@organizerUnSelected')
  ->name('organizerunselected');

    /**
     * @see Camp List
     */

   Route::post('/assignrole/{camp}', 'CampController@assignRole')->name('assignrole');
   Route::get('/{camp}/camplist', 'CampController@campList')->name('camplist');
   Route::get('/camp-complete/{camp}', 'CampController@campComplete')->name('campcomplete');

  });

  Route::namespace('Precamp')->name('patient.')->prefix('patient')->group(function () {


  /**
   * @see Patient Upload
   */
  Route::get('patient', 'PatientController@uploadForm')->name('uploadform');
  Route::post('patient', 'PatientController@upload')->name('upload');
  Route::get('add-db', 'PatientController@addToDB')->name('addtodb');

  /**
   * @see First Call
   */
  Route::get('{patientable?}', 'PatientController@patientTable')->name('view');
  Route::get('{patient}/edit/{page}/{type?}', 'PatientController@editPatient')
        ->name('edit');

  Route::post('{patient}/update/{page}', 'PatientController@updatePatient')
      ->name('update');

  Route::get('{patient}/wrongnumber', 'PatientController@wrongNumber')
        ->name('wrongnumber');
  Route::post('{patient}/remarks', 'PatientController@remarks')->name('remarks');

  /**
   * @see Letter
   */
  Route::get('{patient}/printletter/', 'PatientController@printLetter')
        ->name('printletter');
  Route::get('{patient}/printlabel/', 'PatientController@printLabel')
        ->name('printlabel');
  Route::get('{patient}/letterposted/', 'PatientController@letterPosted')
        ->name('letterposted');

  /**
   * @see secondCall
   */


  Route::get('{patient}/letter-enquire/', 'PatientController@letterEnquire')
               ->name('letterenquire');
  Route::post('{patient}/firstcall/', 'PatientController@firstCall')
              ->name('firstcall');
  Route::get('{patient}/eligible/', 'PatientController@eligible')
              ->name('eligible');


  // Route::get('camp/vanue/create', 'CampController@createVanue')->name('camp.createVanue');
  });
