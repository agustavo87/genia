<?php

namespace App\Contracts;

interface GenerateImage
{
    public function handle(string $prompt, string $id): string;
}
