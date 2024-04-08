<?php

namespace Tests\Components\GenerateImage;

use App\Actions\FakeGenerateImage;
use App\Contracts\GenerateImage;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImage;

class FakeGenerateImageTest extends TestCase
{
    use TestsGenerateImage;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->bind(GenerateImage::class, FakeGenerateImage::class);
        Storage::fake('public');
    }
}
