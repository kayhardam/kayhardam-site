<?php

use App\Http\Controllers\LeerdoelenController;
use App\Support\FieldNotes;
use Illuminate\Support\Facades\Route;
use App\Support\Werk;

Route::get('/', function () {
    return view('home', [
        'notes' => FieldNotes::all(),
        'werk' => Werk::all(),
        'featured' => Werk::find('leerdoel-coach'),
    ]);
});

Route::get('/notes/{slug}', function (string $slug) {
    $note = FieldNotes::find($slug);

    abort_if(!$note, 404);

    return view('note', ['note' => $note]);
});

Route::get('/werk/{slug}', function (string $slug) {
    $case = Werk::find($slug);
    abort_if(!$case, 404);
    return view('werk', ['werk' => $case]);
});

Route::view('/tools/team-shuffler', 'tools.team-shuffler')->name('tools.team-shuffler');
Route::get('/tools/leerdoelen', [LeerdoelenController::class, 'show'])->name('tools.leerdoelen');
Route::post('/tools/leerdoelen', [LeerdoelenController::class, 'synthesize'])
    ->middleware('throttle:leerdoelen')
    ->name('tools.leerdoelen.synthesize');

Route::get('/sitemap.xml', function () {
    return response()
        ->view('sitemap', ['notes' => FieldNotes::all()])
        ->header('Content-Type', 'application/xml');
});

Route::get('/feed.xml', function () {
    return response()
        ->view('feed', ['notes' => FieldNotes::all()])
        ->header('Content-Type', 'application/rss+xml; charset=UTF-8');
});
