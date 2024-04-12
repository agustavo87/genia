<?php

namespace Tests\Integration\GenerateImage;

use App\Contracts\GenerateImage;
use App\DTOs\GenerateImageData;
use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;
use App\Factories\GetimgGenerateImageWithSimplePromptFactory;
use Storage;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImage;

class GetimgGenerateImageWithSimplePromptTest extends TestCase
{
    use TestsGenerateImage;

    protected function setUp(): void
    {
        parent::setUp();
        if (! config('generate.test.integrate')) {
            $this->markTestSkipped('Not integrate generative adapters');
        }
        Storage::fake('public');
    }

    protected function getGenerateImage(): GenerateImage
    {
        return (new GetimgGenerateImageWithSimplePromptFactory)->makeFromConfig();
    }

    /** @test */
    public function calling_getimg_image_generator_without_a_key_raises_an_error()
    {
        $this->expectException(GenerateImageAdapterCouldNotBeResolved::class);
        config()->set('generate.adapters.getimg.key', null);
        $generateImage = $this->getGenerateImage();
        $generateImage->handle(new GenerateImageData('a lion', 'someid1234'));
    }
}
