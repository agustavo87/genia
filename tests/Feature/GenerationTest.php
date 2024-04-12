<?php

namespace Tests\Feature;

use App\Contracts\ImageGeneratorKit;
use App\Factories\SimplePromptImageGeneratorKit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GenerationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->app->singleton(ImageGeneratorKit::class, function (Application $app) {
            return new SimplePromptImageGeneratorKit(
                $app->make(Request::class),
                'fake'
            );
        });
        Storage::fake('public');
    }

    /** @test */
    public function main_page_working(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('generate')
            ->assertSee(['GenIA', 'Prompt', 'Generate']);
    }

    /** @test */
    public function generation_route_call_generate_service_and_redirects_with_to_show()
    {
        $this->post(route('generation.generate', [
            'prompt' => 'a cat',
        ]))
            ->assertRedirectContains(route('generation.show'));
    }
}
