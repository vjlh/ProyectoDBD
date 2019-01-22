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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('welcome');

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/paquetes', function () {
    return view('paquetes');
});

Route::get('/seguros', function () {
    return view('seguros');
});

Route::get('/promociones', function () {
    return view('promociones');
});

Route::get('/hoteles', function () {
    return view('hoteles');
});

Route::get('/autos', function () {
    return view('autos');
});

Route::get('/destinos', function () {
    return view('destinos');
});




Route::get('/vuelos', function () {
    $vuelos = Vuelo::all();
    return View('vuelos')->with('vuelos', $vuelos);
});






Route::get('/BuscarVuelo', 'VuelosController@filtrarVuelos')->name('filtrado');
Route::resource('/Administrador','AdministradoresController');
Route::resource('/Aeropuerto','AeropuertosController');
Route::resource('/Asiento','AsientosController');
Route::resource('/Avion','AvionesController');
Route::resource('/Beneficio','BeneficiosController');
Route::resource('/Ciudad','CiudadesController');
Route::resource('/Equipaje', 'EquipajesController');
Route::resource('/Habitacion', 'HabitacionesController');
Route::resource('/Historial', 'HistorialesController');
Route::resource('/Hospedaje','HospedajesController');
Route::resource('/Pais','PaisesController');
Route::resource('/Paquete','PaquetesController');
Route::resource('/Pasajero','PasajerosController');
Route::resource('/Promocion','PromocionesController');
Route::resource('/Reserva','ReservasController');
Route::resource('/Restriccion','RestriccionesController');
Route::resource('/Seguro','SegurosController');
Route::resource('/Ticket','TicketsController');
Route::resource('/Transporte','TransportesController');
Route::resource('/Seguro','SegurosController');
Route::resource('/User','UsersController');
Route::resource('/Seguro','SegurosController');
Route::resource('/Vuelo','VuelosController');
Route::resource('/Beneficio_Seguro','Beneficio_SeguroController');
Route::resource('/Habitacion_Reserva','Habitacion_ReservaController');
Route::resource('/Pasajero_Reserva','Pasajero_ReservaController');
Route::resource('/Transporte_Reserva','Transporte_ReservaController');