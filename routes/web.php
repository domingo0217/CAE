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

Route::get('/', function (){
    return view('index');
});

Route::get('main', function (){
    return view('main');
});

Route::get('pagos', function(){
    return view('pagos');
});

Route::get('AgregarMiembro', function(){
    return view('AgregarMiembro');
});

Route::get('AgregarUsuario', function(){
    return view('AgregarUsuarios');
});

Route::get('AgregarCapacitaciones', function(){
    return view('AgregarCapacitaciones');
});

Route::get('AgregarRol', function(){
    return view('AgregarRol');
});

Route::get('AgregarCargo', function(){
    return view('AgregarCargo');
});

Route::get('AgregarDelegacion', function(){
    return view('AgregarDelegacion');
});

Route::get('AgregarEstado', function(){
    return view('AgregarEstado');
});

Route::get('AgregarDocumento', function(){
    return view('AgregarDocumento');
});