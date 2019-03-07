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

use App\Transporte;
use App\Vuelo; 
use App\Hospedaje; 
use App\Ciudad; 
use App\Paquete;
use App\Seguro;
use App\Promocion;
use App\Pais;
use App\Asiento;
use App\Avion;
use App\Beneficio;

use Illuminate\Pagination\LengthAwarePaginator;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/mail', 'MailController@Home');
Route::post('send/email', 'MailController@sendmail');



Route::get('/', function () {
    return view('home');
});


Route::get('/inicio', function () {
    return view('home');
});

Route::get('/seleccion_tipo_paquetes/', function () {
    return View('seleccion_tipo_paquetes');
});

Route::get('/paquetes/{tipo}', function ($tipo) {
    $paquetes = Paquete::all()->where('tipo_paquete','=',$tipo);
    return view('paquetes')->with('paquetes',$paquetes);
});

Route::get('/seguros', function () {
    $seguros = Beneficio::all();
    return view('reservar_seguro',compact('seguros'));
});

Route::get('/promociones', function () {
    $promociones = Promocion::all();
    return view('promociones')->with('promociones',$promociones);
});

Route::get('/hoteles', function () {
    $hospedajes = Hospedaje::all();
    return View('hoteles')->with('hospedajes', $hospedajes);
});

Route::get('/autos', function () {
    $transportes = Transporte::all();
    return view('autos')->with('transportes',$transportes);
});

Route::get('/destinos', function () {
    $paises = Pais::all();
    return view('destinos')->with('paises',$paises);
});

Route::get('/reservar_vuelo/{id}', function ($id) {
    $vuelo = Vuelo::find($id);
    return View('reservar_vuelo')->with('vuelo', $vuelo);
});

Route::get('/reservar_auto/{id}', function ($id) {
    $transporte = Transporte::find($id);
    return View('reservar_auto', ['transporte' => $transporte]);
});

Route::get('/buscar_autos', function () {
    $ciudades1 = Ciudad::all();
    $ciudades = $ciudades1->sortBy('nombre_ciudad');

    $transportes = Transporte::all();
    return View('buscar_autos', ['ciudades' => $ciudades, 'transportes' => $transportes]);
});
Route::get('/buscar_seguros', function () {
    return View('buscar_seguro');
});
 
Route::get('/buscar_vuelos', function () {
    $ciudades1 = Ciudad::all();
    $ciudades = $ciudades1->sortBy('nombre_ciudad');

    $vuelos = Vuelo::all();
    return View('buscar_vuelos', ['ciudades' => $ciudades, 'vuelos' => $vuelos]);
});

Route::get('/vuelos', function () {
    $vuelos = Vuelo::all();
    return View('vuelos')->with('vuelos', $vuelos);
});

Route::get('/hospedajes', function () {
    $hospedajes = Hospedaje::all();
    return View('hospedajes')->with('hospedajes', $hospedajes);
});

Route::get('/reservaHospedaje', function () {
    $ciudades1 = Ciudad::all();
    $ciudades = $ciudades1->sortBy('nombre_ciudad');

    return View('reservaHospedaje',compact('ciudades'));
});
Route::get('/reservar_seguro', function () {
    return View('reservar_seguro');
});

Route::get('/detallesReservaTransporte', function () {
    return view('detallesReservaTransporte');
});

Route::get('/detallesReservaHospedaje', function () {
    return view('detallesReservaHospedaje');
});

Route::get('/detallePaquete', function () {
    return view('detallePaquete');
});

Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/checkin_1', function () {
    return view('checkin_1');
});
Route::get('/checkin_2', function () {
    return view('checkin_2');
});
Route::get('/historial', function () {
    return view('historial');
});

Route::get('/historial2', function () {
    return view('historial2');
});

Route::post('/enviar', 'MailController@sendmail');

Route::get('/Asiento/resasVuelta/', 'AsientosController@resasVuelta');
Route::get('/Asiento/asientosVuelta/', 'AsientosController@asientosVuelta');
Route::get('/Asiento_Vuelo/CheckInVuelo/', 'Asiento_VueloController@buscarCheckIn');
Route::get('/Paquete/reservarPaquete/', 'PaquetesController@reservarPaquete');
Route::get('/Paquete/Reservar/{id}','PaquetesController@respaq')->name('Reservas.respaq');
Route::get('/Asiento/Reservar/','AsientosController@resas')->name('Reservas.resas');
Route::get('/Beneficio/Listado/','BeneficiosController@mostrarSeguros')->name('Beneficios.mosSeg');
Route::get('/Seguro/CalculoCosto/','SegurosController@calcularCosto')->name('Seguros.calCos');
Route::get('/Beneficio_Seguro/AdquirirSeguro/','Beneficio_SeguroController@adquirirSeguro')->name('Beneficio_Seguro.adqSeg');
Route::get('/Reserva/Check-in/{cod_obtenido}','ReservasController@checkIn')->name('Reserva.chIn');

Route::resource('/Administrador','AdministradoresController');
Route::resource('/Aeropuerto','AeropuertosController');
Route::resource('/Asiento','AsientosController');
Route::resource('/Asiento_Vuelo','Asiento_VueloController');
Route::resource('/Avion','AvionesController');
Route::resource('/Beneficio','BeneficiosController');
Route::resource('/Ciudad','CiudadesController');
Route::resource('/Equipaje', 'EquipajesController');
Route::resource('/Habitacion', 'HabitacionesController');
Route::resource('/Historial', 'HistorialesController');
Route::resource('/Historial2', 'HistorialesController');
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
Route::resource('/carrito','CarritoController');
Route::get('/admin', 'AdministradoresController@f1');
Route::get('/historial2','HistorialesController@shaw');
