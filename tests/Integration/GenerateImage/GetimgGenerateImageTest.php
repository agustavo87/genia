<?php

namespace Tests\Integration\GenerateImage;

use App\Contracts\GenerateImage;
use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;
use App\Factories\GenerateImageFactory;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImage;

class GetimgGenerateImageTest extends TestCase
{
    use TestsGenerateImage;

    protected function setUp(): void
    {
        parent::setUp();
        if (! config('generate.test.integrate')) {
            $this->markTestSkipped('Not integrate generative adapters');
        }
        /**
         * WARNING THIS WILL ACTUALLY CALL THE API
         */
        $this->app->bind(
            GenerateImage::class,
            (new GenerateImageFactory)->getBinding('getimg')
        );
        Storage::fake('public');

    }

    /** @test */
    public function calling_getimg_image_generator_without_a_key_raises_an_error()
    {
        $this->expectException(GenerateImageAdapterCouldNotBeResolved::class);
        config()->set('generate.adapters.getimg.key', null);
        /** @var GenerateImage */
        $generateImage = $this->app->get(GenerateImage::class);
        $generateImage->handle('a lion', 'someid1234');
    }
}
