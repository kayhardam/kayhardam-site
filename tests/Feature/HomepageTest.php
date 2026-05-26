<?php

it('serves the homepage', function () {
    $this->get('/')->assertOk();
});

it('renders muybridge components in tool cards', function () {
    $response = $this->get('/');

    $response->assertOk()
        ->assertSee('class="muybridge"', false)
        ->assertSee('--muybridge-color: #3a7fbf', false)
        ->assertSee('--muybridge-color: #d44a2e', false)
        ->assertSee('class="tool-card', false);
});
