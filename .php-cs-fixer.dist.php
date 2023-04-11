<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src')
;

$config = new Valantic\PhpCsFixerConfig\Config();

return $config
    ->setFinder($finder)
;
