<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AppointmentController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    return view('welcome');
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
    Route::post('/add', 'add');
    Route::get('/admiService', 'showAdmi'); 

    Route::post('/editService', 'showEdit'); 
    Route::post('/store', 'update'); 

    Route::post('/deleteService', 'delete');
    
    Route::get('/showServices', 'showServices'); 
 });


 
 Route::controller(AppointmentController::class)->group(function(){
    Route::get('/addAppointment', 'showServices'); 
    Route::get('/admiAppointment', 'showAppoinments'); 
    Route::post('/addApp', 'addapp');
    Route::get('/calendar', 'ca');
    Route::get('/calendar/{id}', 'caid');
    Route::get('/appointment/{id}', 'showAppoinment');
    Route::post('/editStatus', 'updateStatus'); 
    Route::get('/viewAppointment', 'viewAppoinments'); 
 });

 Route::get('download-ServicesPDF',[AdController::class, 'downloadServicesPDF'])->name('download-ServicesPDF');
//Auth::routes();


