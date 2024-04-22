<?php

namespace Tests\Components\GenerateImage;

use App\Actions\FakeGenerateImageWithSimplePrompt;
use App\Contracts\GenerateImageWithSimplePrompt;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImageWithSimplePrompt;

class FakeGenerateImageWithSimplePromptTest extends TestCase
{
    use TestsGenerateImageWithSimplePrompt;

    protected function getGenerateImageWithSimplePromptHandler(): GenerateImageWithSimplePrompt
    {
        return new FakeGenerateImageWithSimplePrompt();
    }
}
