<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\PreventBrowserBackHistory;
use App\Http\Middleware\RoleCheckAfterSession;
use App\Http\Middleware\EnsureUserHasRole;

 Route::get('/', function () {
     return view('welcome');
 })->name('welcome');

//api

// Route::prefix('/api')->group( function () {
//     Route::prefix('/client')->group(function () {
//         Route::get('compte', [UserController::class, 'showUser'])->name('client');
//         Route::get('collecteId', [CollecteController::class, 'showId'])->name('collecteId');
//         Route::get('pointcollecte', [CollecteController::class, 'showCollecte'])->name('pointcollecte');
//         Route::get('entreprise', [UserController::class, 'showEntreprise'])->name('entreprise'); 
//         Route::get('passage', [CollecteController::class, 'showPassage'])->name('passage');
//         Route::get('attestation', [DocumentController::class, 'showAttestation'])->name('attestation');
//     });
// });

// route client

Route::get('client', [ViewController::class, 'showView'])->name('viewclient'); //ok
Route::post('api/compte/{id}', [UserController::class, 'showUser'])->name('client'); //ok
Route::post('api/collecteId/{id}', [CollecteController::class, 'showId'])->name('collecteId');
Route::post('api/pointcollecte/{id}', [CollecteController::class, 'showCollecte'])->name('pointcollecte');
Route::post('api/entreprise/{id}', [UserController::class, 'entreprise'])->name('entreprise'); 
Route::post('api/postpassage/{id}', [CollecteController::class, 'showPassage'])->name('passage');
Route::post('api/attestation/{id}', [DocumentController::class, 'showAttestation'])->name('attestation');

// route admin



// route account

Route::post('login', [AccountController::class, 'login'])->name('login'); //ok
Route::post('logout' , [AccountController::class, 'logout'])->name('logout');  //ok


// Route::middleware(EnsureUserHasRole::class)->group(function () {
//     Route::get('/example', [UserController::class, 'how'])->name('example');
// });

// // Route::prefix('/')->group(function () {
// // //     Route::get('client', [UserController::class, 'show'])->middleware('auth');
//     Route::post('login', [AccountController::class, 'authenticate'])->name('login');
//     Route::get('logout' , [AccountController::class, 'logout']);
// // //     Route::get('logout'  , [AccountController::class, 'logout'] )->middleware('auth');
// // });
// Route::middleware([PreventBrowserBackHistory::class])->prefix('/')->group(function () {
//     Route::prefix('coucou')->group(function () {
//         Route::get('', function () {
//             return 'YO !!!!!';
//         });
//     });
// });
// // middleware('auth')->

// Route::prefix('/api')->group( function () {
//     Route::prefix('/client')->group(function () {
//         Route::get('compte', [UserController::class, 'showUser'])->name('client');
//         Route::get('collecteId', [CollecteController::class, 'showId'])->name('collecteId');
//         Route::get('pointcollecte', [CollecteController::class, 'showCollecte'])->name('pointcollecte');
//         Route::get('entreprise', [UserController::class, 'showEntreprise'])->name('entreprise'); 
//         Route::get('passage', [CollecteController::class, 'showPassage'])->name('passage');
//         Route::get('attestation', [DocumentController::class, 'showAttestation'])->name('attestation');

//         // Route::get('collecte', [UserController::class, 'show']);       
//         // Route::get('dechet', [UserController::class, 'show']);
//         // Route::get('document', [UserController::class, 'show']);
//     // Route::post('login', [AccountController::class, 'authenticate'])->name('login')->withoutMiddleware([RoleCheckAfterSession::class]);
//     // Route::get('logout' , [AccountController::class, 'logout']);
//     });
// });
