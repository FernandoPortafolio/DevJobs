<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\VacanteController;
use App\Models\Candidato;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Verify es para que mande correo de verificacion al crear una cuenta
Auth::routes(['verify' => true]);

//-------------------------------------------------------------------------
//Rutas Protegidas
//-------------------------------------------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('/vacantes')->group(function () {
        Route::get('/', [VacanteController::class, 'index'])->name('vacantes.index');
        Route::get('/create', [VacanteController::class, 'create'])->name('vacantes.create');
        Route::post('/', [VacanteController::class, 'store'])->name('vacantes.store');
        Route::get('/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
        Route::put('/{vacante}', [VacanteController::class, 'update'])->name('vacantes.update');
        Route::delete('/{vacante}', [VacanteController::class, 'destroy'])->name('vacantes.destroy');

        //Subir imagenes
        Route::post('/image', [VacanteController::class, 'image'])->name('vacantes.image');
        Route::delete('/image/{name}', [VacanteController::class, 'deleteImage'])->name('vacantes.delete');

        //Cambiar el estado de una vacante
        Route::put('/{vacante}/status', [VacanteController::class, 'changeStatus']);
    });

    Route::get('/notifications', NotificationsController::class)->name('notifications');
});

//-------------------------------------------------------------------------
//Rutas Publicas
//-------------------------------------------------------------------------
Route::get('/', InicioController::class);

Route::post('/vacantes/search', [VacanteController::class, 'search'])->name('vacantes.search');
Route::get('/vacantes/search', [VacanteController::class, 'results'])->name('vacantes.results');
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::prefix('/candidatos')->group(function () {
    Route::post('/', [CandidatoController::class, 'store'])->name('candidatos.store');
    Route::get('/{id}', [CandidatoController::class, 'index'])->name('candidatos.index');
});


//Esta ruta solo es de desarrollo para ver el template del correo en el navegador
Route::get('/notification', function () {
    $candidato = Candidato::find(1);

    return (new NuevoCandidato($candidato))
        ->toMail($candidato);
});
