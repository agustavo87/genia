<?php

namespace App\Http\Controllers;

use App\Actions\GenerateImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function create(Request $request): View
    {
        return view('generate', [
            'prompt' => $request->has('prompt') ? $request->prompt : '',
        ]);
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

    public function generate(Request $request, GenerateImage $generateImage): RedirectResponse
    {
        $validated = $request->validate(['prompt' => 'required|string']);
        $prompt = $validated['prompt'];
        $id = uniqid();
        $generateImage->handle($prompt, $id);

        return redirect()->route(
            'generation.show',
            [
                'id' => $id,
                'prompt' => $prompt,
            ]
        );
    }
}
