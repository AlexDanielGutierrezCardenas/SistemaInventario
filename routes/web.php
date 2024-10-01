<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DistribuidoraController;
use App\Http\Controllers\DespachadorController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\FormularioController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    //return "dashboard";
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::resource('persona', PersonaController::class);
// Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index');
// Route::get('/persona/create', [PersonaController::class, 'create'])->name('persona.create');
// Route::post('/persona/store', [PersonaController::class, 'store'])->name('persona.store');
// Route::get('/persona/{id_persona}', [PersonaController::class, 'show']);
// Route::delete('/persona/{id_persona}', PersonaController::class .'@destroy')->name('persona.destroy');
// Route::get('/persona/{id_persona}/edit', PersonaController::class .'@edit')->name('persona.edit');
// Route::put('/persona/{id_persona}', PersonaController::class .'@update')->name('persona.update');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
//     Route::resource('persona', PersonaController::class);
//     Route::resource('profile', ProfileController::class);
//     Route::resource('proveedor', ProveedorController::class);
//     Route::resource('cliente', ClienteController::class);
//     Route::resource('empleado', EmpleadoController::class);
//     Route::resource('distribuidora', DistribuidoraController::class);
// });



// Route::group(['middleware' => ['role:Admin']], function () {
//     Route::resource('persona', PersonaController::class);
// });
require __DIR__.'/auth.php';

Route::resource('persona', PersonaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/persona', [App\Http\Controllers\PersonaController::class, 'index'])->name('persona');
// Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente');
// Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');´
Route::resource('users', UserController::class);
Route::resource('persona', PersonaController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('roles', RoleController::class);
Route::resource('proveedor', ProveedorController::class);
Route::resource('despachador', DespachadorController::class);
Route::resource('solicitante', SolicitanteController::class);
Route::resource('formulario', FormularioController::class);
Route::resource('crear-registro', FormularioController::class);
// Route::get('/formulario/crear-registro/{persona_id}', [FormularioController::class, 'create'])->name('formulario.create');

