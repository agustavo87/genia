<?php

namespace App\Actions;

interface GenerateImage
{
    public function handle($prompt, $id): string;
}
