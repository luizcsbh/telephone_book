<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
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


Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');


Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');

    Route::get('contact', [ContactController::class, 'index'])->name('app.contact');
    Route::post('/contact/listar', [ContactController::class, 'listar'])->name('app.contact.listar');
    Route::get('/contact/listar', [ContactController::class, 'listar'])->name('app.contact.listar');
    Route::get('/contact/adicionar', [ContactController::class, 'adicionar'])->name('app.contact.adicionar');
    Route::post('/contact/adicionar', [ContactController::class, 'adicionar'])->name('app.contact.adicionar');
    Route::get('/contact/editar/{id}/{msg?}', [ContactController::class, 'editar'])->name('app.contact.editar');
    Route::get('/contact/excluir/{id}', [ContactController::class, 'excluir'])->name('app.contact.excluir')->middleware('log.acesso');

    Route::get('phone', [PhoneController::class, 'index'] )->name('app.phone');
    Route::get('/phone/create', [PhoneController::class, 'create'] )->name('app.phone.create');
    Route::post('/phone/create', [PhoneController::class, 'create'] )->name('app.phone.create');
    Route::get('/phone/edit/{id}', [PhoneController::class, 'edit'] )->name('app.phone.edit');
    Route::put('/phone/update', [PhoneController::class, 'update'] )->name('app.phone.update');
    Route::get('/phone/show/{id}', [PhoneController::class, 'show'] )->name('app.phone.show');
    Route::post('/phone/store', [PhoneController::class, 'store'] )->name('app.phone.store');
    Route::get('/phone/destroy/{id}', [PhoneController::class, 'destroy'] )->name('app.phone.destroy')->middleware('log.acesso');
});

Route::fallback(function() {echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página inicial';});
