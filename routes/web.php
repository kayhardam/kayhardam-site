<?php

use App\Http\Controllers\LeerdoelenController;
use App\Support\Werk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'werk' => Werk::all(),
        'featured' => Werk::find('leerdoel-coach'),
    ]);
});

Route::get('/werk/{slug}', function (string $slug) {
    $case = Werk::find($slug);
    abort_if(! $case, 404);

    return view('werk', ['werk' => $case]);
});

Route::view('/tools/team-shuffler', 'tools.team-shuffler')->name('tools.team-shuffler');
Route::get('/tools/leerdoelen', [LeerdoelenController::class, 'show'])->name('tools.leerdoelen');
Route::post('/tools/leerdoelen', [LeerdoelenController::class, 'synthesize'])
    ->middleware('throttle:leerdoelen')
    ->name('tools.leerdoelen.synthesize');

Route::get('/sitemap.xml', function () {
    return response()
        ->view('sitemap', ['werk' => Werk::all()])
        ->header('Content-Type', 'application/xml');
});
