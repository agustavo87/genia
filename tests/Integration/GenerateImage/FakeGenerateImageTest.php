<?php

namespace Tests\Integration\GenerateImage;

use App\Actions\FakeGenerateImage;
use App\Actions\GenerateImage;
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
