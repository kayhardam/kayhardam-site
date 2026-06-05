<?php

use App\Ai\Agents\Leerdoelen;

beforeEach(function () {
    cache()->flush();
});

function validLeerdoelenPayload(array $overrides = []): array
{
    return array_replace_recursive([
        'context' => [
            'groep' => 'Groep 5, 24 leerlingen',
            'activiteit' => 'springen_kast',
            'type' => 'lesdoel',
            'domein' => 'motorisch',
        ],
        'gedrag' => 'afzetten en landen',
        'inhoud' => 'kastsprong met spreidbeweging',
        'voorwaarden' => 'lage kast, matje, op tempo van klap',
        'criteria' => '8 van 10 sprongen in hurkzit landen',
    ], $overrides);
}

it('synthetiseert één leerdoel-zin bij geldige wizard-input', function () {
    Leerdoelen::fake(['De leerling zet af met twee voeten en landt in een hurkzit.']);

    $response = $this->postJson(
        route('tools.leerdoelen.synthesize'),
        validLeerdoelenPayload(),
    );

    $response->assertOk();
    $response->assertExactJson([
        'leerdoel' => 'De leerling zet af met twee voeten en landt in een hurkzit.',
    ]);

    Leerdoelen::assertPrompted(
        fn ($prompt) => str_contains($prompt->prompt, 'groep: Groep 5, 24 leerlingen')
            && str_contains($prompt->prompt, 'gedrag: afzetten en landen')
            && str_contains($prompt->prompt, 'criteria: 8 van 10 sprongen in hurkzit landen'),
    );
});

it('valideert alle acht verplichte velden bij lege input', function () {
    Leerdoelen::fake();

    $response = $this->postJson(route('tools.leerdoelen.synthesize'), []);

    $response->assertStatus(422);
    $response->assertInvalid([
        'context.groep',
        'context.activiteit',
        'context.type',
        'context.domein',
        'gedrag',
        'inhoud',
        'voorwaarden',
        'criteria',
    ]);

    Leerdoelen::assertNeverPrompted();
});

it('weigert onbekende activiteit en buiten-enum waarden', function () {
    Leerdoelen::fake();

    $response = $this->postJson(
        route('tools.leerdoelen.synthesize'),
        validLeerdoelenPayload([
            'context' => [
                'activiteit' => 'onbekend',
                'type' => 'jaardoel',
                'domein' => 'fysiek',
            ],
        ]),
    );

    $response->assertStatus(422);
    $response->assertInvalid([
        'context.activiteit',
        'context.type',
        'context.domein',
    ]);

    Leerdoelen::assertNeverPrompted();
});

it('geeft 500 JSON-error wanneer de agent faalt', function () {
    Leerdoelen::fake(fn () => throw new RuntimeException('boom'));

    $response = $this->postJson(
        route('tools.leerdoelen.synthesize'),
        validLeerdoelenPayload(),
    );

    $response->assertStatus(500);
    $response->assertExactJson([
        'error' => 'Er ging iets mis bij het synthetiseren. Probeer het opnieuw.',
    ]);
});

it('blokkeert de elfde call binnen een uur per IP', function () {
    Leerdoelen::fake();

    $payload = validLeerdoelenPayload();

    foreach (range(1, 10) as $i) {
        $this->postJson(route('tools.leerdoelen.synthesize'), $payload)
            ->assertOk();
    }

    $this->postJson(route('tools.leerdoelen.synthesize'), $payload)
        ->assertStatus(429);
});
