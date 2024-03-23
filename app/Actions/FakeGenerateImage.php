<?php

namespace App\Actions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FakeGenerateImage implements GenerateImage
{
    public function handle($prompt, $id): string
    {
        $path = 'images/'.$id.'.png';

        Storage::disk('public')
            ->put($path, File::get(resource_path('images/fake_img.png')));

        return $path;
    }
}
