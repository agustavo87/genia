<?php

namespace App\Actions;

use App\Contracts\GenerateImage;
use App\DTOs\GenerateImageData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GetimgGenerateImageWithSimplePrompt implements GenerateImage
{
    public function __construct(
        public string $key
    ) {
    }

    public function handle(GenerateImageData $data): string
    {
        // Some change
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer '.$this->key,
            'content-type' => 'application/json',
            // 'https://api.getimg.ai/v1/stable-diffusion/text-to-image'
        ])
            ->post('https://api.getimg.ai/v1/stable-diffusion-xl/text-to-image', [
                'prompt' => $data->prompt,
                // "model" => icbinp-seco',
                // dark-sushi-mix-v2-25, synthwave-punk-v2, openjourney-v4, arcane-diffusion, realistic-vision-v5-1,
                // moonfilm-utopia-v3, mo-di-diffusion, van-gogh-diffusion, stable-diffusion-v2-1, stable-diffusion-xl-v1-0,
                'output_format' => 'png',
            ])
            ->throwUnlessStatus(200);

        /** @var string */
        $base64EncodedImage = $response->json('image');
        assert(is_string($base64EncodedImage));

        $imageData = base64_decode($base64EncodedImage);

        $imagePath = 'images/'.$data->id.'.png';

        Storage::disk('public')->put($imagePath, $imageData);

        return $imagePath;
    }
}
