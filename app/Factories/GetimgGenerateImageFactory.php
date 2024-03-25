<?php

namespace App\Factories;

use App\Actions\GetimgGenerateImage;
use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;

class GetimgGenerateImageFactory
{
    public function makeFromConfig(): GetimgGenerateImage
    {
        $key = config('generate.adapters.getimg.key');
        assert(is_string($key) || is_null($key));
        if (is_null($key)) {
            throw new GenerateImageAdapterCouldNotBeResolved(
                'The key for GetImg Image Generator adapter could not be found.'
            );
        }

        return new GetimgGenerateImage($key);
    }
}
