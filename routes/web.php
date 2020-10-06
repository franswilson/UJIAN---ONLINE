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
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@postlogin');




//role yang bisa di akses admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/customer', 'CustomerController@index');
    Route::post('/customer/create', 'CustomerController@create');
    Route::get('/customer/{id}/edit', 'CustomerController@edit')->name('customer.edit');
    Route::post('/customer/{id}/update', 'CustomerController@update');
    Route::get('/customer/{id}/delete', 'CustomerController@delete')->name('customer.delete');

    //delete all
    // Route::delete('/data_soal', 'Data_soalController@deleteall');
    Route::delete('/data_soal/{id}', ['as' => 'data_soal.destroy', 'uses' => 'Data_soalController@destroy']);
    Route::delete('/delete-multiple-product', ['as' => 'data_soal.multiple-delete', 'uses' => 'Data_soalController@deleteMultiple']);
    //modul
    Route::get('/nilai', 'UserController@nilai');


    //praktikum
    Route::get('/praktikum', 'NilaiController@praktikum');

    Route::post('/praktikum/create', 'NilaiController@create');
    Route::get('/praktikum/{id}/edit', 'NilaiController@edit')->name('praktikum.edit');
    Route::post('/praktikum/{id}/update', 'NilaiController@update');
    Route::get('/praktikum/{id}/delete', 'NilaiController@delete')->name('praktikum.delete');



    //data soal
    Route::get('/data_soal', 'Data_soalController@index');
    Route::post('/data_soal/create', 'Data_soalController@create');
    Route::get('/data_soal/{id}/edit', 'Data_soalController@edit')->name('data_soal.edit');
    Route::post('/data_soal/{id}/update', 'Data_soalController@update');
    Route::get('/data_soal/{id}/delete', 'Data_soalController@delete')->name('data_soal.delete');

    //soal



    // User
    Route::get('/user', 'UserController@index');
    Route::post('/user/create', 'UserController@create');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@delete')->name('user.delete');


    //waktu
    Route::get('/waktu', 'WaktuController@index');
    Route::get('/waktu/{id}/edit', 'WaktuController@edit')->name('waktu.edit');
    Route::post('/waktu/{id}/update', 'WaktuController@update');
    Route::get('/waktu/{id}/delete', 'WaktuController@delete')->name('waktu.delete');


    //data mahasiswa
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::post('/mahasiswa/create', 'MahasiswaController@create');
    Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::post('/mahasiswa/{id}/update', 'MahasiswaController@update');
    Route::get('/mahasiswa/{id}/delete', 'MahasiswaController@delete')->name('mahasiswa.delete');

    //profile mahasiswa
    Route::get('/mahasiswa/{id}/profile', 'MahasiswaController@profile');

<<<<<<< HEAD

=======
>>>>>>> 90187482d1a356c0b12f04a9723edb32f657b519
    //Export Excel
    Route::get('/soal', 'Data_soalController@index');
    Route::get('/soal/export_excel', 'Data_soalController@export_excel');

    //Import Excel
    Route::post('/soal/import_excel', 'Data_soalController@import_excel');
});


// role yang bisa di akses mahasiswa
Route::group(['middleware' => ['auth', 'checkRole:mahasiswa,admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');


    // soal
    Route::get('/soal', 'SoalController@getSoal');
    // Route::get('/soal', 'SoalController@praktikum');
    // Route::get('/modul', 'NilaiController@modul');

    Route::get('/jawaban', 'SoalController@getjawaban');
    Route::post('submit-jawab', 'SubmitJawabController@store')->name('jawab.store');

    //profile
    Route::get('/user/{id}/profile', 'UserController@profile');
    Route::get('/soal/{id}/{jawab}', 'SoalController@simpansoal');
<<<<<<< HEAD
=======

>>>>>>> 90187482d1a356c0b12f04a9723edb32f657b519
});
