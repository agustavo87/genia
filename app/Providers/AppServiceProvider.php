<?php

namespace App\Providers;

use App\Actions\GenerateImage;
use App\Actions\GetimgGenerateImage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** @var string[] */
    public array $bindings = [
        GenerateImage::class => GetimgGenerateImage::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
