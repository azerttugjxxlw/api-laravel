<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\MyclientController;
use App\Http\Controllers\Api\MyproduitController;
use App\Http\Controllers\Api\MydefprixController;
use App\Http\Controllers\Api\MycategorieController;
use App\Http\Controllers\Api\MyfactureController;
use App\Http\Controllers\Api\MysortiestockController;
use App\Http\Controllers\Api\MypanierController;

use App\Http\Controllers\Api\MystockController;
use App\Http\Controllers\Api\MyvporteController;





use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * auth Module
*/
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
/**
 * Products Module
*/
Route::apiResources([
    '/myproduits' => MyproduitController::class,
]);
Route::apiResources([
    '/mydefprix' => MydefprixController ::class,
]);
/**
 * clients Module
*/
Route::apiResources([
    '/myclients' => MyclientController::class,
]);

/**
 * clients Module
*/
Route::get('/myclients/{id}', [MyclientController::class, 'show'])->name('myclients.show');
Route::post('/myclients', [MyclientController::class, 'store'])->name('myclients.store');
Route::put('/myclients/{id}', [MyclientController::class, 'update'])->name('myclients.update');
Route::delete('/myclients/{id}', [MyclientController::class, 'destroy'])->name('myclients.destroy');
/**
 * Products Module
*/

//Route::get('/myproduits', [MyproduitController::class, 'index'])->name('myproduits.list');
Route::get('/myproduits/{id}', [MyproduitController::class, 'show'])->name('myproduits.show');
Route::post('/myproduits', [MyproduitController::class, 'store'])->name('myproduits.store');
Route::put('/myproduits/{id}', [MyproduitController::class, 'update'])->name('myproduits.update');
Route::delete('/myproduits/{id}', [MyproduitController::class, 'destroy'])->name('myproduits.destroy');

/**
 * mycategorie Module
*/
Route::get('/mycategorie', [MycategorieController::class, 'index'])->name('mycategorie.list');
Route::get('/mycategorie/{id}', [MycategorieController::class, 'show'])->name('mycategorie.show');
Route::post('/mycategorie', [MycategorieController::class, 'store'])->name('mycategorie.store');
Route::put('/mycategorie/{id}', [MycategorieController::class, 'update'])->name('mycategorie.update');
Route::delete('/mycategorie/{id}', [MycategorieController::class, 'destroy'])->name('mycategorie.destroy');
/**
 * facture Module
*/
Route::get('/myfacture', [MyfactureController::class, 'index'])->name('myfacture.list');
Route::get('/myfacture/{id}', [MyfactureController::class, 'show'])->name('myfacture.show');
Route::post('/myfacture', [MyfactureController::class, 'store'])->name('myfacture.store');
Route::put('/myfacture/{id}', [MyfactureController::class, 'update'])->name('myfacture.update');
Route::delete('/myfacture/{id}', [MyfactureController::class, 'destroy'])->name('myfacture.destroy');
/**
 * stocksortie Module
*/
Route::get('/mysortiestock', [MysortiestockController::class, 'index'])->name('mysortiestock.list');
Route::get('/mysortiestock/{id}', [MysortiestockController::class, 'show'])->name('mysortiestock.show');
Route::post('/mysortiestock', [MysortiestockController::class, 'store'])->name('mysortiestock.store');
Route::put('/mysortiestock/{id}', [MysortiestockController::class, 'update'])->name('mysortiestock.update');
Route::delete('/mysortiestock/{id}', [MysortiestockController::class, 'destroy'])->name('mysortiestock.destroy');
/**
 * panier Module
*/
Route::get('/mypanier', [MypanierController::class, 'index'])->name('mypanier.list');
Route::get('/mypanier/{id}', [MypanierController::class, 'show'])->name('mypanier.show');
Route::post('/mypanier', [MypanierController::class, 'store'])->name('mypanier.store');
Route::put('/mypanier/{id}', [MypanierController::class, 'update'])->name('mypanier.update');
Route::delete('/mypanier/{id}', [MypanierController::class, 'destroy'])->name('mypanier.destroy');

/**
 * panier Module
*/
Route::get('/mystock', [MystockController::class, 'index'])->name('mystock.list');
Route::get('/mystock/{id}', [MystockController::class, 'show'])->name('mystock.show');
Route::post('/mystock', [MystockController::class, 'store'])->name('mystock.store');
Route::put('/mystock/{id}', [MystockController::class, 'update'])->name('mystock.update');
Route::delete('/mystock/{id}', [MystockController::class, 'destroy'])->name('mystock.destroy');

/**
 * vprote Module
*/
Route::get('/myvporte', [MyvporteController::class, 'index'])->name('myvporte.list');
Route::get('/myvporte/{id}', [MyvporteController::class, 'show'])->name('myvporte.show');
Route::post('/myvporte', [MyvporteController::class, 'store'])->name('myvporte.store');
Route::put('/myvporte/{id}', [MyvporteController::class, 'update'])->name('myvporte.update');
Route::delete('/myvporte/{id}', [MyvporteController::class, 'destroy'])->name('myvporte.destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
