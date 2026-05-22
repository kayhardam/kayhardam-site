<?php

namespace App\Http\Controllers;

use App\Ai\Agents\Leerdoelen;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Throwable;

class LeerdoelenController
{
    /**
     * Toon de leerdoel-coach wizard.
     */
    public function show(): View
    {
        return view('tools.leerdoelen');
    }

    /**
     * Synthetiseer één GIVC-leerdoel uit de wizard-inputs.
     */
    public function synthesize(Request $request): JsonResponse
    {
        $activiteiten = array_keys(config('beweegactiviteiten.activiteiten'));

        $validated = $request->validate([
            'context.groep' => ['required', 'string', 'max:50'],
            'context.activiteit' => ['required', 'string', Rule::in($activiteiten)],
            'context.type' => ['required', Rule::in(['reeksdoel', 'lesdoel'])],
            'context.domein' => ['required', Rule::in(['motorisch', 'cognitief', 'sociaal-emotioneel'])],
            'gedrag' => ['required', 'string', 'max:100'],
            'inhoud' => ['required', 'string', 'max:200'],
            'voorwaarden' => ['required', 'string', 'max:200'],
            'criteria' => ['required', 'string', 'max:200'],
        ]);

        $prompt = $this->buildPrompt($validated);

        try {
            $response = (new Leerdoelen)->prompt($prompt);

            return response()->json([
                'leerdoel' => trim($response->text),
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Er ging iets mis bij het synthetiseren. Probeer het opnieuw.',
            ], 500);
        }
    }

    /**
     * Bouw de prompt-payload uit de gevalideerde inputs.
     */
    private function buildPrompt(array $data): string
    {
        return <<<PROMPT
        context:
        - groep: {$data['context']['groep']}
        - activiteit: {$data['context']['activiteit']}
        - type: {$data['context']['type']}
        - domein: {$data['context']['domein']}

        GIVC:
        - gedrag: {$data['gedrag']}
        - inhoud: {$data['inhoud']}
        - voorwaarden: {$data['voorwaarden']}
        - criteria: {$data['criteria']}
        PROMPT;
    }
}
