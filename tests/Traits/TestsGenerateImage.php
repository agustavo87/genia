<?php

namespace Tests\Traits;

use App\Contracts\GenerateImage;
use App\DTOs\GenerateImageData;
use Illuminate\Support\Facades\Storage;

trait TestsGenerateImage
{
    /** @test */
    public function the_image_generator_copies_the_image_on_public_folder()
    {
        $generate = $this->getGenerateImage();
        $path = $generate->handle(new GenerateImageData('a lion', 'someid1234'));
        $this->assertEquals('images/someid1234.png', $path);
        Storage::disk('public')->assertExists($path);
    }

    abstract protected function getGenerateImage(): GenerateImage;
}
