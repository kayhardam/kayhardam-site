<?php

it('serves a case study', function () {
    $this->get('/werk/leerdoel-coach')->assertOk();
});

it('returns 404 for unknown case studies', function () {
    $this->get('/werk/dit-bestaat-niet')->assertNotFound();
});
