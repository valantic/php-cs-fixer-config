<?php

namespace Valantic\PhpCsFixerConfig;

class Config extends \PhpCsFixer\Config
{
    public function getRules(): array
    {
        return [
            '@PER' => true,
        ];
    }
}
