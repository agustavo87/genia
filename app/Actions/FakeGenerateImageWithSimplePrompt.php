<?php

namespace App\Actions;

use App\Contracts\GenerateImage;
use App\DTOs\GenerateImageData;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FakeGenerateImageWithSimplePrompt implements GenerateImage
{
    public function handle(GenerateImageData $data): string
    {
        $path = 'images/'.$data->id.'.png';

        Storage::disk('public')
            ->put($path, File::get(resource_path('images/fake_img.png')));

        return $path;
    }
}
