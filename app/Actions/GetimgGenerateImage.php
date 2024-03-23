<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GetimgGenerateImage implements GenerateImage
{
    public function handle($prompt, $id): string
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer key-4wNUkCO63EBHtxp38tDgLID1MfCh1IZdCyqgU2HQFDX5SPDWGKPkE8IGO6ZSUNx8oG4MHgQlm1Jp9kralQZldhHBfF9DZCnk',
            'content-type' => 'application/json',
        // 'https://api.getimg.ai/v1/stable-diffusion/text-to-image'
        ])->post('https://api.getimg.ai/v1/stable-diffusion-xl/text-to-image', [
            "prompt" => $prompt,
            // "model" => icbinp-seco',
            // dark-sushi-mix-v2-25, synthwave-punk-v2, openjourney-v4, arcane-diffusion, realistic-vision-v5-1, 
            // moonfilm-utopia-v3, mo-di-diffusion, van-gogh-diffusion, stable-diffusion-v2-1, stable-diffusion-xl-v1-0,
            "output_format" => "png"
        ]);
    
        $base64EncodedImage = $response->json('image');
    
        $imageData = base64_decode($base64EncodedImage);
        
        $imagePath = 'images/' . $id . '.png'; 
    
        Storage::disk('public')->put($imagePath, $imageData);

        return $imagePath;
    }
}
