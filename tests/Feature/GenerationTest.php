<?php

namespace Tests\Feature;

use App\Actions\FakeGenerateImage;
use App\Actions\GenerateImage;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Testing\Fakes\Fake;
use Mockery\MockInterface;
use Tests\TestCase;
use Tests\Traits\TestsGenerateImage;

class GenerationTest extends TestCase
{
    use TestsGenerateImage;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->bind(GenerateImage::class, FakeGenerateImage::class);
        Storage::fake('public');
    }

    /** @test */
    public function main_page_working(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('generate')
            ->assertSee(["Imaginator", "Prompt", "Generate"]);
    }

    /** @test */
    public function generation_route_call_generate_service_and_redirects_with_to_show()
    {
        $this->post(route('generation.generate', [
                'prompt' => 'a cat'
            ]))
            ->assertRedirectContains(route('generation.show'));
    }
}
