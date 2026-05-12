<?php

it('serves a field note', function () {
    $this->get('/notes/van-nul-tot-live')->assertOk();
});

it('returns 404 for unknown notes', function () {
    $this->get('/notes/dit-bestaat-niet')->assertNotFound();
});
