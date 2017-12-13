<?php

use Illuminate\Http\Request;
use App\Appointment;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Http\Resources\AppointmentCollection;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::get('/appointments','AppointmentController@index');
//Route::get('/appointment/{id}','AppointmentController@show');
//Route::post('/appointments', 'AppointmentController@store');

Route::resource('/appointments', 'AppointmentController');