<?php

return [
    'adapter' => env('GENIA_ADAPTER', 'fake'),
    'adapters' => [
        'getimg' => [
            'key' => env('GETIMG_KEY'),
        ],
    ],
    'test' => [
        'integrate' => env('GENIA_INTEGRATE_TESTS', false),
    ],
];
