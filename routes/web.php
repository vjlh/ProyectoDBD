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


use App\Vuelo;  

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vuelos', function () {
    $vuelos = Vuelo::all();
    return View('vuelos')->with('vuelos', $vuelos);
});

Route::get('/Administrador/all', 'AdministradoresController@index'); 
Route::get('/Administrador/show/{id}', 'AdministradoresController@show'); 
Route::post('/Administrador/destroy/{id}', 'AdministradoresController@destroy');
Route::get('/Administrador/store', 'AdministradoresController@store');

Route::get('/Aeropuerto/all', 'AeropuertosController@index'); 
Route::get('/Aeropuerto/show/{id}', 'AeropuertosController@show'); 
Route::post('/Aeropuerto/destroy/{id}', 'AeropuertosController@destroy');
Route::get('/Aeropuerto/store', 'AeropuertosController@store');

Route::get('/Asiento/all', 'AsientosController@index'); 
Route::get('/Asiento/show/{id}', 'AsientosController@show'); 
Route::post('/Asiento/destroy/{id}', 'AsientosController@destroy');
Route::get('/Asiento/store', 'AsientosController@store');

Route::get('/Avion/all', 'AvionesController@index'); 
Route::get('/Avion/show/{id}', 'AvionesController@show'); 
Route::post('/Avion/destroy/{id}', 'AvionesController@destroy');
Route::get('/Avion/store', 'AvionesController@store');

Route::get('/Beneficio/all', 'BeneficiosController@index'); 
Route::get('/Beneficio/show/{id}', 'BeneficiosController@show'); 
Route::post('/Beneficio/destroy/{id}', 'BeneficiosController@destroy');
Route::get('/Beneficio/store', 'BeneficiosController@store');

Route::get('/Ciudad/all', 'CiudadesController@index'); 
Route::get('/Ciudad/show/{id}', 'CiudadesController@show'); 
Route::post('/Ciudad/destroy/{id}', 'CiudadesController@destroy');
Route::get('/Ciudad/store', 'CiudadesController@store');

Route::get('/Equipaje/all', 'EquipajesController@index'); 
Route::get('/Equipaje/show/{id}', 'EquipajesController@show'); 
Route::post('/Equipaje/destroy/{id}', 'EquipajesController@destroy');
Route::get('/Equipaje/store', 'EquipajesController@store');

Route::get('/Habitacion/all', 'HabitacionesController@index'); 
Route::get('/Habitacion/show/{id}', 'HabitacionesController@show'); 
Route::post('/Habitacion/destroy/{id}', 'HabitacionesController@destroy');
Route::get('/Habitacion/store', 'HabitacionesController@store');

Route::get('/Historial/all', 'HistorialesController@index'); 
Route::get('/Historial/show/{id}', 'HistorialesController@show'); 
Route::post('/Historial/destroy/{id}', 'HistorialesController@destroy');
Route::get('/Historial/store', 'HistorialesController@store');

Route::get('/Hospedaje/all', 'HospedajesController@index'); 
Route::get('/Hospedaje/show/{id}', 'HospedajesController@show'); 
Route::post('/Hospedaje/destroy/{id}', 'HospedajesController@destroy');
Route::get('/Hospedaje/store', 'HospedajesController@store');

Route::get('/Pais/all', 'PaisesController@index'); 
Route::get('/Pais/show/{id}', 'PaisesController@show'); 
Route::post('/Pais/destroy/{id}', 'PaisesController@destroy');
Route::get('/Pais/store', 'PaisesController@store');

Route::get('/Paquete/all', 'PaquetesController@index'); 
Route::get('/Paquete/show/{id}', 'PaquetesController@show'); 
Route::post('/Paquete/destroy/{id}', 'PaquetesController@destroy');
Route::get('/Paquete/store', 'PaquetesController@store');

Route::get('/Pasajero/all', 'PasajerosController@index'); 
Route::get('/Pasajero/show/{id}', 'PasajerosController@show'); 
Route::post('/Pasajero/destroy/{id}', 'PasajerosController@destroy');
Route::get('/Pasajero/store', 'PasajerosController@store');

Route::get('/Promocion/all', 'PromocionesController@index'); 
Route::get('/Promocion/show/{id}', 'PromocionesController@show'); 
Route::post('/Promocion/destroy/{id}', 'PromocionesController@destroy');
Route::get('/Promocion/store', 'PromocionesController@store');

Route::get('/Reserva/all', 'ReservasController@index'); 
Route::get('/Reserva/show/{id}', 'ReservasController@show'); 
Route::post('/Reserva/destroy/{id}', 'ReservasController@destroy');
Route::get('/Reserva/store', 'ReservasController@store');

Route::get('/Restriccion/all', 'RestrinccionesController@index'); 
Route::get('/Restriccion/show/{id}', 'RestrinccionesController@show'); 
Route::post('/Restriccion/destroy/{id}', 'RestrinccionesController@destroy');
Route::get('/Restriccion/store', 'RestrinccionesController@store');

Route::get('/Seguro/all', 'SegurosController@index'); 
Route::get('/Seguro/show/{id}', 'SegurosController@show'); 
Route::post('/Seguro/destroy/{id}', 'SegurosController@destroy');
Route::get('/Seguro/store', 'SegurosController@store');

Route::get('/Ticket/all', 'TicketsController@index'); 
Route::get('/Ticket/show/{id}', 'TicketsController@show'); 
Route::post('/Ticket/destroy/{id}', 'TicketsController@destroy');
Route::get('/Ticket/store', 'TicketsController@store');

Route::get('/Transporte/all', 'TransportesController@index'); 
Route::get('/Transporte/show/{id}', 'TransportesController@show'); 
Route::post('/Transporte/destroy/{id}', 'TransportesController@destroy');
Route::get('/Transporte/store', 'TransportesController@store');

Route::get('/User/all', 'UsersController@index'); 
Route::get('/User/show/{id}', 'UsersController@show'); 
Route::post('/User/destroy/{id}', 'UsersController@destroy');
Route::get('/User/store', 'UsersController@store');

Route::get('/Vuelo/all', 'VuelosController@index'); 
Route::get('/Vuelo/show/{id}', 'VuelosController@show'); 
Route::post('/Vuelo/destroy/{id}', 'VuelosController@destroy');
Route::get('/Vuelo/store', 'VuelosController@store');