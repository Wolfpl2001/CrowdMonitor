<?php


use App\Http\Controllers\EvenementController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TerugkijkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('events', EvenementController::class);
Route::get('/events', [EvenementController::class, 'event'])->name('events.index');
Route::post('/events', [EvenementController::class, 'store'])->name('events.store');
Route::delete('/events/{id}', [EvenementController::class, 'destroy'])->name('events.destroy');

// Route::get('/{id}/{city}', [WeatherController::class, 'index'])->name('weather.index');

Route::get('/{id}/{city}', function () {
    // Call the index method from EvenementController
    $evenementController = new EvenementController();
    $evenementResult = $evenementController->index(request());

    // Call the index method from WeatherController
    $weatherController = new WeatherController();
    $weatherResult = $weatherController->index(request());

    // Combine the results or perform any other logic as needed
    return view('Liveindex', [
        'evenementResult' => $evenementResult,
        'weatherResult' => $weatherResult,
    ]);
})->name('weather.index');

Route::get('/', [EvenementController::class, 'index'])->name('live');
Route::post('/', [EvenementController::class, 'index'])->name('live');
Route::post('/', [EvenementController::class, 'GetEventData'])->name('loadEvent');
Route::post('/', function () {
    $evenementController = new EvenementController();
    $evenementResult = $evenementController->GetEventData(request());
    $weatherController = new WeatherController();
    $weatherResult = $weatherController->index(request());

    return view('Liveindex', [
        'evenementResult' => $evenementResult,
        'weatherResult' => $weatherResult,
    ]);
})->name('loadEvent');

Route::get('/terugkijkpagina', [TerugkijkController::class, 'index'])->name('terugkijkpagina.index');