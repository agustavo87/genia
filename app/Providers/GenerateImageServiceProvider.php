<?php

namespace App\Providers;

use App\Contracts\ImageGeneratorKit;
use App\Factories\SimplePromptImageGeneratorKit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class GenerateImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageGeneratorKit::class, function (Application $app) {
            $adapter = config('generate.adapter');
            assert(is_string($adapter));

            return $app->make(SimplePromptImageGeneratorKit::class, [
                'adapter' => $adapter,
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
