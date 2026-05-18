<?php

namespace App\Http\Controllers;

use App\Ai\Agents\Leerdoelen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class LeerdoelenController
{
    /**
     * Toon het formulier voor de leerdoelen-coach.
     */
    public function show(): View
    {
        return view('tools.leerdoelen');
    }

    /**
     * Verwerk het formulier en genereer drie leerdoelen via de AI-agent.
     */
    public function generate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'activiteit' => ['required', 'string', 'max:500'],
            'niveau' => ['required', 'in:PO,VO,VSO'],
        ]);

        $prompt = sprintf(
            "%s\n\nNiveau: %s",
            $validated['activiteit'],
            $validated['niveau']
        );

        try {
            /** @var \Laravel\Ai\Responses\StructuredAgentResponse $response */
            $response = (new Leerdoelen)->prompt($prompt);

            return back()
                ->withInput()
                ->with('leerdoelen', $response->structured);
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors([
                    'generator' => 'Er ging iets mis bij het genereren. Probeer het opnieuw.',
                ]);
        }
    }
}
