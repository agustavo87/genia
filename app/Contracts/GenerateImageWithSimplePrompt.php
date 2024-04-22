<?php

namespace App\Contracts;

use App\DTOs\GenerateImageWithSimplePromptData;

interface GenerateImageWithSimplePrompt
{
    public function handle(GenerateImageWithSimplePromptData $data): string;
}
