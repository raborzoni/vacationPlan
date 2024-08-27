<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiAuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

$router->get('foo', function () {
    return 'Hello World';
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('/login', [ApiAuthController::class, 'login']);
    Route::post('/register',[ApiAuthController::class, 'register']);

});

Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::post('/logout',[ApiAuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});