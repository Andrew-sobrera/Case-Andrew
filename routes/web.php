<?php

use App\Http\Controllers\PessoasController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::prefix('/')->group(function(){
    Route::get('/', [PessoasController::class, 'index'])->name('pessoas-index');
    Route::post('/', [PessoasController::class, 'store'])->name('pessoas-store');
    Route::delete('/{id}/edit', [PessoasController::class, 'destroy'])->name('pessoas-destroy');
})

?>