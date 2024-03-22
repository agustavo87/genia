<?php

namespace Tests\Feature;

use App\Actions\GenerateImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCase;

class GenerationTest extends TestCase
{
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
        $this->mock(GenerateImage::class, function (MockInterface $mock) {
            $mock->shouldReceive('handle')->once();
        });
        $this->post(route('generation.generate', [
                'prompt' => 'a cat'
            ]))
            ->assertRedirectContains(route('generation.show'));
    }
}
