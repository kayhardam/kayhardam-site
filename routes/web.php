<?php

use App\Support\FieldNotes;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['notes' => FieldNotes::all()]);
});

Route::get('/notes/{slug}', function (string $slug) {
    $note = FieldNotes::find($slug);

    abort_if(!$note, 404);

    return view('note', ['note' => $note]);
});