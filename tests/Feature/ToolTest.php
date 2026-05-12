<?php

it('serves the team shuffler', function () {
    $this->get('/tools/team-shuffler')->assertOk();
});
