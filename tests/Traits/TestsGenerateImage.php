<?php

namespace Tests\Traits;

use App\Contracts\GenerateImage;
use Illuminate\Support\Facades\Storage;

trait TestsGenerateImage
{
    /** @test */
    public function the_image_generator_copies_the_image_on_public_folder()
    {
        /** @var GenerateImage */
        $generate = $this->app->get(GenerateImage::class);
        $path = $generate->handle('a lion', 'someid1234');
        $this->assertEquals('images/someid1234.png', $path);
        Storage::disk('public')->assertExists($path);
    }
}
