<?php

use App\Http\Controllers\Api\BookmarkController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ResourceController;
use App\Http\Controllers\Api\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/bookmarks', [BookmarkController::class, 'index']);
    Route::get('/bookmarks/{note}', [BookmarkController::class, 'bookmark']);

    Route::get('pages/{note}/list', [PageController::class, 'index']);
    Route::get('sections/{page}/list', [SectionController::class, 'index']);
    Route::get('resources/{section}/list', [ResourceController::class, 'index']);

    Route::apiResource('notes', NoteController::class);
    Route::apiResource('pages', PageController::class)->except('index');
    Route::apiResource('sections', SectionController::class)->except('index');
    Route::apiResource('resources', ResourceController::class)->except('index');
});
