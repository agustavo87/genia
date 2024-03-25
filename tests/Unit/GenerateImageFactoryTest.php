<?php

namespace Tests\Unit;

use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;
use App\Factories\GenerateImageFactory;
use PHPUnit\Framework\TestCase;

class GenerateImageFactoryTest extends TestCase
{
    /** @test */
    public function an_error_is_thrown_if_the_adapter_is_not_recognized(): void
    {
        $this->expectException(GenerateImageAdapterCouldNotBeResolved::class);

        (new GenerateImageFactory())->getBinding('inexistent');
    }
}
