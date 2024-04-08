<?php

namespace App\Providers;

use App\Contracts\GenerateImage;
use App\Factories\GenerateImageFactory;
use Illuminate\Support\ServiceProvider;

class GenerateImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->setupGenTxt2ImgAdapter();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected function setupGenTxt2ImgAdapter(): void
    {
        $configuredAdapter = config('generate.adapter');
        assert(is_string($configuredAdapter));
        $bindingB = (new GenerateImageFactory)->getBinding($configuredAdapter);
        $this->app->bind(GenerateImage::class, $bindingB);
    }
}
