<?php
require_once __DIR__ . '/../vendor/autoload.php';

\VCR\VCR::configure()
    ->setCassettePath(__DIR__ . '/fixtures')
    ->enableLibraryHooks(['curl'])
    ->enableRequestMatchers(['url', 'method', 'query_string'])
;
\VCR\VCR::turnOn();
