<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;

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

Route::get('/', [PageController::class, 'index']);
Route::get('/post-by-slug/{slug}', [PageController::class, 'postBySlug']);
Route::get('/categories', [PageController::class, 'categories']);
Route::get('/tags', [PageController::class, 'tags']);
