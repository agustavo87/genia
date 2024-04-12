<?php

namespace Tests\Components\GenerateImage;

use App\Actions\FakeGenerateImageWithSimplePrompt;
use App\Contracts\GenerateImage;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImage;

class FakeGenerateImageWithSimplePromptTest extends TestCase
{
    use TestsGenerateImage;

    protected function getGenerateImage(): GenerateImage
    {
        return new FakeGenerateImageWithSimplePrompt();
    }
}
