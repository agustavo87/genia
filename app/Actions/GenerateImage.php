<?php

namespace App\Actions;

interface GenerateImage
{
    public function handle(string $prompt, string $id): string;
}
