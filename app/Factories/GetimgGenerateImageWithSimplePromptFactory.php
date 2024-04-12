<?php

namespace App\Factories;

use App\Actions\GetimgGenerateImageWithSimplePrompt;
use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;

class GetimgGenerateImageWithSimplePromptFactory
{
    public function makeFromConfig(): GetimgGenerateImageWithSimplePrompt
    {
        $key = config('generate.adapters.getimg.key');
        assert(is_string($key) || is_null($key));
        if (is_null($key)) {
            throw new GenerateImageAdapterCouldNotBeResolved(
                'The key for GetImg Image Generator adapter could not be found.'
            );
        }

        return new GetimgGenerateImageWithSimplePrompt($key);
    }
}
