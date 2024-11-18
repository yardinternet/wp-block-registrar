<?php

declare(strict_types=1);

use Yard\BlocksRegistration\Facades\BlocksRegistration;

it('can retrieve a random inspirational quote', function () {
    $quote = BlocksRegistration::getQuote();

    expect($quote)->tobe('For every Sage there is an Acorn.');
});
