<?php

namespace App\DTOs;

class GenerateImageData
{
    public function __construct(
        public readonly string $prompt,
        public readonly string $id,
    ) {
        //
    }
}
