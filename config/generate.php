<?php

return [
    'adapter' => env('GENIA_ADAPTER', 'fake'),
    'adapters' => [
        'getimg' => [
            'key' => env('GETIMG_KEY'),
            'model' => env('GETIMG_MODEL', 'stable-diffusion-xl'),
            'steps' => env('GETIMG_STEPS', 1),
        ],
    ],
    'test' => [
        'integrate' => env('GENIA_INTEGRATE_TESTS', false),
    ],
];
