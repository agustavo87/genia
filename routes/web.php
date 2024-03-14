<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/generar', function (Request $request) {
    return view('generar', [
        'prompt' => $request->has('prompt') ? $request->prompt : '' 
    ]);
});

Route::get('show', function(Request $request) {
    $data = $request->validate([
        'id' => 'required|string',
        'prompt' => 'sometimes|string'
    ]);
    
    return view('show', [
        'img' => "/storage/images/{$data['id']}.png",
        'prompt' => key_exists('prompt', $data) ? $data['prompt'] : 'Unknow prompt.'
    ]);
});

Route::post('/generate', function (Request $request) {

    $validated = $request->validate(['prompt' => 'required|string']);
    // dd($validated);
    $response = Http::withHeaders([
        'accept' => 'application/json',
        'authorization' => 'Bearer key-4wNUkCO63EBHtxp38tDgLID1MfCh1IZdCyqgU2HQFDX5SPDWGKPkE8IGO6ZSUNx8oG4MHgQlm1Jp9kralQZldhHBfF9DZCnk',
        'content-type' => 'application/json',
    ])->post('https://api.getimg.ai/v1/stable-diffusion-xl/text-to-image', [
        "prompt" => $validated['prompt'],
        // "model" => 'icbinp-seco',
        // "model" => 'dark-sushi-mix-v2-25',
        // "model" => 'synthwave-punk-v2',
        // "model" => 'openjourney-v4',
        // "model" => 'arcane-diffusion',
        // "model" => 'realistic-vision-v5-1',
        // "model" => 'moonfilm-utopia-v3',
        // "model" => 'mo-di-diffusion',
        // "model" => 'van-gogh-diffusion',
        // "model" => 'stable-diffusion-v2-1',
        // "model" => 'stable-diffusion-xl-v1-0',
        "output_format" => "png"
    ]);

    $base64EncodedImage = $response->json('image');

    $imageData = base64_decode($base64EncodedImage);

    $id = uniqid();
    // Assuming your storage disk is 'public'
    $imagePath = 'images/' . $id . '.png'; // Or any desired extension

    Storage::disk('public')->put($imagePath, $imageData);

    return redirect("/show?id=$id&prompt={$validated['prompt']}");

});
