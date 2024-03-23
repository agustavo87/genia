<?php

namespace Tests\Integration\GenerateImage;

use App\Actions\FakeGenerateImage;
use App\Actions\GenerateImage;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImage;

/**
 * WARNING THIS WILL ACTUALLY CALL THE API
 */
class DefaultGenerateImageTest extends TestCase
{
    use TestsGenerateImage;

    protected function setUp(): void
    {
        parent::setUp();
        if(!config('generate.test.integrate')) {
            $this->markTestSkipped('Not integrate generative adapters');
        }
        Storage::fake('public');
    }
}
