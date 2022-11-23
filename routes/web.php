<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AppointmentController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware;
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
    return view('home');
});

Route::get('/homeAdmi', function () {
    return view('homeAdmi');
})->middleware(['auth', 'verified'])->name('homeAdmi');

Route::get('/admiService', function () {
    return view('admiService');
});

Route::get('/addAppointment', function () {
    return view('addAppointment');
});

Route::get('/dashboard', [AdController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [AdController::class, 'show']);
require __DIR__.'/auth.php';


Route::controller(HomeController::class)->group(function(){
    Route::get('/product', 'product'); 
   // Route::post('/agregar', 'agregar');
   // Route::post('/eliminar/{id}', 'eliminar'); 
    //Route::post('/eliminar', 'eliminar'); 
 
    //Route::post('/editar', 'muestraEdicion'); 
    //Route::post('/almacenar', 'update'); 
 
    //Route::post('/comprar', 'comprar'); 
 });

 Route::controller(AdController::class)->group(function(){
    Route::get('/home', 'show')->name('home'); 
    Route::post('/add', 'add')->middleware('role:admi');
    Route::get('/admiService', 'showAdmi')->middleware('role:admin'); 

    Route::post('/editService', 'showEdit')->middleware('role:admi'); 
    Route::post('/store', 'update')->middleware('role:admi'); 

    Route::post('/deleteService', 'delete')->middleware('role:admi');
    
    Route::get('/showServices', 'showServices'); 
 });


 
 Route::controller(AppointmentController::class)->group(function(){
    Route::get('/addAppointment', 'showServices')->middleware('role:registered'); 
    Route::get('/admiAppointment', 'showAppoinments')->middleware('role:admi'); 
    Route::post('/addApp', 'addapp')->middleware('role:registered');
    Route::post('/editAppointment', 'editapp')->middleware('role:registered');
    Route::get('/calendar', 'ca')->middleware('role:admi');
    Route::get('/calendar/{id}', 'caid')->middleware('role:admi');
    Route::get('/appointment/{id}', 'showAppoinment')->middleware('role:registered');
    Route::post('/editStatus', 'updateStatus')->middleware('role:admi'); 
    Route::get('/viewAppointment', 'viewAppoinments')->middleware('role:registered'); 
 });

 Route::get('download-ServicesPDF',[AdController::class, 'downloadServicesPDF'])->name('download-ServicesPDF');
//Auth::routes();


