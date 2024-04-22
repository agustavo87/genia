<?php

namespace App\DTOs;

class GenerateImageWithSimplePromptData
{
    public function __construct(
        public readonly string $prompt,
        public readonly string $id,
    ) {
        //
    }
}
