<?php

namespace Tests\Traits;

use App\Contracts\GenerateImageWithSimplePrompt;
use App\DTOs\GenerateImageWithSimplePromptData;
use Illuminate\Support\Facades\Storage;

trait TestsGenerateImageWithSimplePrompt
{
    /** @test */
    public function the_image_generator_copies_the_image_on_public_folder()
    {
        $generate = $this->getGenerateImageWithSimplePromptHandler();
        $path = $generate->handle(new GenerateImageWithSimplePromptData('a lion', 'someid1234'));
        $this->assertEquals('images/someid1234.png', $path);
        Storage::disk('public')->assertExists($path);
    }

    abstract protected function getGenerateImageWithSimplePromptHandler(): GenerateImageWithSimplePrompt;
}
