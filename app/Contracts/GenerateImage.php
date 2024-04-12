<?php

namespace App\Contracts;

use App\DTOs\GenerateImageData as GenerateImageData;

interface GenerateImage
{
    public function handle(GenerateImageData $data): string;
}
