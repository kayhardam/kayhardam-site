<?php

use App\Ai\Agents\Leerdoelen;

beforeEach(function () {
    cache()->flush();
});

it('genereert drie leerdoelen bij geldige input', function () {
    Leerdoelen::fake();

    $response = $this->post(route('tools.leerdoelen.generate'), [
        'activiteit' => 'Basketbal: pivoteren en passeren in tweetallen',
        'niveau' => 'VO',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('leerdoelen');

    Leerdoelen::assertPrompted(fn($prompt) => str_contains($prompt->prompt, 'Niveau: VO'));
});

it('weigert lege input met validatiefouten', function () {
    Leerdoelen::fake();

    $response = $this->post(route('tools.leerdoelen.generate'), []);

    $response->assertSessionHasErrors(['activiteit', 'niveau']);
});

it('blokkeert de elfde call binnen een uur per IP', function () {
    Leerdoelen::fake();

    $payload = [
        'activiteit' => 'Trefbal in groepjes van zes',
        'niveau' => 'PO',
    ];

    foreach (range(1, 10) as $i) {
        $this->post(route('tools.leerdoelen.generate'), $payload)
            ->assertRedirect();
    }

    $this->post(route('tools.leerdoelen.generate'), $payload)
        ->assertStatus(429);
});
