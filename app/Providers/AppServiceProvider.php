<?php

namespace App\Providers;

use App\Contracts\GenerateImage;
use App\Factories\GenerateImageFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->setupGenTxt2ImgAdapter();
    }

    protected function setupGenTxt2ImgAdapter(): void
    {
        $configuredAdapter = config('generate.adapter');
        assert(is_string($configuredAdapter));
        $binding = (new GenerateImageFactory)->getBinding($configuredAdapter);
        $this->app->bind(GenerateImage::class, $binding);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
