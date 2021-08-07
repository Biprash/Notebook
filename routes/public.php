<?php

use App\Http\Controllers\Api\Publics\ExploreController;
use App\Http\Controllers\Api\Publics\PageController;
use App\Http\Controllers\Api\Publics\SectionController;
use App\Http\Controllers\Api\Publics\ResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Public API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" and "api" middleware group. Enjoy building your API!
|
*/

Route::get('explore', [ExploreController::class, 'index']);
Route::get('all-notes', [ExploreController::class, 'allNotes']);

Route::get('pages/{note}/list', [PageController::class, 'index']);
Route::get('sections/{page}/list', [SectionController::class, 'index']);
Route::get('resources/{section}/list', [ResourceController::class, 'index']);
Route::get('resources/{resource}', [ResourceController::class, 'show']);
