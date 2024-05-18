<?php

namespace App\Actions;

use App\Contracts\GenerateImageWithSimplePrompt;
use App\DTOs\GenerateImageWithSimplePromptData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GetimgGenerateImageWithSimplePrompt implements GenerateImageWithSimplePrompt
{
    public function __construct(
        public string $key
    ) {
    }

    public function handle(GenerateImageWithSimplePromptData $data): string
    {
        $model = config('generate.adapters.getimg.model');

        if ($model == 'stable-diffusion-xl') {
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'authorization' => 'Bearer '.$this->key,
                'content-type' => 'application/json',
            ])
                ->post('https://api.getimg.ai/v1/stable-diffusion-xl/text-to-image', [
                    'prompt' => $data->prompt,
                    'output_format' => 'png',
                ])
                ->throwUnlessStatus(200);
        } else {
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'authorization' => 'Bearer '.$this->key,
                'content-type' => 'application/json',
            ])
                ->post('https://api.getimg.ai/v1/stable-diffusion/text-to-image', [
                    'prompt' => $data->prompt,
                    'model' => $model,
                    'output_format' => 'png',
                ])
                ->throwUnlessStatus(200);
        }

        /** @var string */
        $base64EncodedImage = $response->json('image');
        assert(is_string($base64EncodedImage));

        $imageData = base64_decode($base64EncodedImage);

        $imagePath = 'images/'.$data->id.'.png';

        Storage::disk('public')->put($imagePath, $imageData);

        return $imagePath;
    }
}
