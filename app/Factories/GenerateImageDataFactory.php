<?php

namespace App\Factories;

use App\DTOs\GenerateImageData;
use Illuminate\Http\Request;

class GenerateImageDataFactory
{
    public function fromRequest(Request $request): GenerateImageData
    {
        $validated = $request->validate(['prompt' => 'required|string']);
        $prompt = $validated['prompt'];
        $id = uniqid();

        return new GenerateImageData($prompt, $id);
    }
}
