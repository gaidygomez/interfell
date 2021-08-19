<?php
use App\Http\Controllers\Auth\{RegisterController, LoginController};
use App\Http\Controllers\UsersController;
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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('users', [UsersController::class, 'users']);
    Route::patch('edit', [UsersController::class, 'edit']);
    Route::delete('delete', [UsersController::class, 'delete']);
    Route::post('logout', [LoginController::class, 'logout']);
});