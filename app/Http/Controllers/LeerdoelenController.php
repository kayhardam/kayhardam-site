<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeerdoelenController
{
    /**
     * Toon het formulier voor de leerdoelen-generator.
     */
    public function show(): View
    {
        return view('tools.leerdoelen');
    }

    /**
     * Verwerk het formulier en genereer drie leerdoelen.
     * Stub — AI-call komt in de volgende stap.
     */
    public function generate(Request $request): RedirectResponse
    {
        return back()->withInput();
    }
}
