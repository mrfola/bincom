<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollingResultController;
use App\Http\Controllers\PollingUnitController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function()
{
    Route::get('/dashboard', [PollingUnitController::class, 'index'])->name('dashboard');
    Route::post('/polling-results', [PollingResultController::class, 'index'])->name('polling_result_index');
    Route::get('/polling-results', [PollingResultController::class, 'show'])->name('polling_result_show');
    Route::post('/create-polling-results', [PollingResultController::class, 'create'])->name('polling_result_create');
    Route::get('/polling-results-lga', [PollingResultController::class, 'showPollingResultsByLga'])->name('polling_result_lga_show');
    Route::post('/polling-results-lga', [PollingResultController::class, 'getPollingResultsByLga'])->name('polling_result_lga_get');

});

require __DIR__.'/auth.php';
