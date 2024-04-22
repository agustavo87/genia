<?php

namespace App\Actions;

use App\Contracts\GenerateImageWithSimplePrompt;
use App\DTOs\GenerateImageWithSimplePromptData;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FakeGenerateImageWithSimplePrompt implements GenerateImageWithSimplePrompt
{
    public function handle(GenerateImageWithSimplePromptData $data): string
    {
        $path = 'images/'.$data->id.'.png';

        Storage::disk('public')
            ->put($path, File::get(resource_path('images/fake_img.png')));

        return $path;
    }
}
