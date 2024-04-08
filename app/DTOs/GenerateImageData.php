<?php

namespace App\DTOs;

class GenerateImageData
{
    public function __construct(
        public string $prompt,
        public string $id,
    ) {
        //
    }
}
