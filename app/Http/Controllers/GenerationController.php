<?php

namespace App\Http\Controllers;

use App\Contracts\GenerateImage;
use App\Factories\GenerateImageDataFactory;
use App\Factories\SimplePromptImageGeneratorFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function create(Request $request, SimplePromptImageGeneratorFactory $simplePromptImageGeneratorFactory): View
    {
        return $simplePromptImageGeneratorFactory->getView();
    }

    public function show(Request $request): View
    {
        $data = $request->validate([
            'id' => 'required|string',
            'prompt' => 'sometimes|string',
        ]);

        return view('show', [
            'img' => "/storage/images/{$data['id']}.png",
            'prompt' => array_key_exists('prompt', $data) ? $data['prompt'] : 'Unknow prompt.',
        ]);
    }

    public function generate(Request $request, GenerateImage $generateImage, GenerateImageDataFactory $generateImageDataFactory): RedirectResponse
    {
        $generateImageData = $generateImageDataFactory->fromRequest($request);
        $generateImage->handle($generateImageData);

        return redirect()->route(
            'generation.show',
            [
                'id' => $generateImageData->id,
                'prompt' => $generateImageData->prompt,
            ]
        );
    }
}
