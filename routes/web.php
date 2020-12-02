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


Route::get('/', function () {
    return view('Auths.login');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/postlogin', 'AuthController@postlogin')->name('postLogin');




//role yang bisa di akses admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/customer', 'CustomerController@index')->name('customer');
    Route::post('/customer/create', 'CustomerController@create')->name('customer.create');
    Route::get('/customer/{id}/edit', 'CustomerController@edit')->name('customer.edit');
    Route::post('/customer/{id}/update', 'CustomerController@update')->name('customer.update');
    Route::get('/customer/{id}/delete', 'CustomerController@delete')->name('customer.delete');

    //delete all
    // Route::delete('/data_soal', 'Data_soalController@deleteall');
    Route::delete('/data_soal/{id}', ['as' => 'data_soal.destroy', 'uses' => 'Data_soalController@destroy']);
    Route::delete('/delete-multiple-product', ['as' => 'data_soal.multiple-delete', 'uses' => 'Data_soalController@deleteMultiple']);

    //modul
    Route::get('/nilai', 'UserController@nilai')->name('nilai');
    Route::get('/modul', 'ModulController@index')->name('modul');

    Route::post('/modul/create', 'ModulController@create')->name('modul.create');
    Route::get('/modul/{id}/edit', 'ModulController@edit')->name('modul.edit');
    Route::post('/modul/{id}/update', 'ModulController@update')->name('modul.update');
    Route::get('/modul/{id}/delete', 'ModulController@delete')->name('modul.delete');


    //praktikum
    Route::get('/praktikum', 'NilaiController@praktikum')->name('praktikum');

    Route::post('/praktikum/create', 'NilaiController@create')->name('praktikum.create');
    Route::get('/praktikum/{id}/edit', 'NilaiController@edit')->name('praktikum.edit');
    Route::post('/praktikum/{id}/update', 'NilaiController@update')->name('praktikum.update');
    Route::get('/praktikum/{id}/delete', 'NilaiController@delete')->name('praktikum.delete');



    //data soal
    Route::get('/data_soal', 'Data_soalController@index')->name('data_soal');
    Route::post('/data_soal/create', 'Data_soalController@create')->name('data_soal.create');
    Route::get('/data_soal/{id}/edit', 'Data_soalController@edit')->name('data_soal.edit');
    Route::post('/data_soal/{id}/update', 'Data_soalController@update')->name('data_soal.update');
    Route::get('/data_soal/{id}/delete', 'Data_soalController@delete')->name('data_soal.delete');

    //soal



    // User
    Route::get('/user', 'UserController@index')->name('user');
    Route::post('/user/create', 'UserController@create')->name('user.create');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}/update', 'UserController@update')->name('user.update');
    Route::get('/user/{id}/delete', 'UserController@delete')->name('user.delete');

    //waktu
    Route::get('/waktu', 'WaktuController@index')->name('waktu');
    Route::get('/waktu/{id}/edit', 'WaktuController@edit')->name('waktu.edit');
    Route::post('/waktu/{id}/update', 'WaktuController@update')->name('waktu.update');
    Route::get('/waktu/{id}/delete', 'WaktuController@delete')->name('waktu.delete');
    Route::post('/waktu/create', 'WaktuController@create')->name('waktu.create');


    //data mahasiswa
    Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
    Route::post('/mahasiswa/create', 'MahasiswaController@create')->name('mahasiswa.create');
    Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::post('/mahasiswa/{id}/update', 'MahasiswaController@update')->name('mahasiswa.update');
    Route::get('/mahasiswa/{id}/delete', 'MahasiswaController@delete')->name('mahasiswa.delete');

    //profile mahasiswa
    Route::get('/mahasiswa/{id}/profile', 'MahasiswaController@profile');

    //Export Excel
    Route::post('/nilai/export_excel', 'UserController@export_excel')->name('idPraktikum');
    Route::get('/nilai/export_excel', 'UserController@export_excel');

    Route::post('/soal/export_excel', 'Data_soalController@export_excel')->name('idPrak');
    Route::get('/soal', 'Data_soalController@index');
    Route::get('/soal/export_excel', 'Data_soalController@export_excel');


    //Import Excel
    Route::post('/soal/import_excel', 'Data_soalController@import_excel')->name('soal.import');
});


// role yang bisa di akses mahasiswa
Route::group(['middleware' => ['auth', 'checkRole:mahasiswa,admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    // soal
    Route::post('/soal', 'SoalController@getSoal')->name('idSoal');
    Route::get('/soal', 'SoalController@getSoal');

    // Route::get('/soal', 'SoalController@praktikum');
    // Route::get('/modul', 'NilaiController@modul');

    Route::get('/jawaban', 'SoalController@getjawaban');
    Route::post('submit-jawab', 'SubmitJawabController@store')->name('jawab.store');


    //profile
    Route::get('/user/profile', 'UserController@profile')->name('mahasiswa.profile');
    Route::get('/soal/{id}/{jawab}', 'SoalController@simpansoal');
});
