<?php

namespace App\Factories;

use App\Actions\FakeGenerateImage;
use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;
use Closure;

class GenerateImageFactory
{
    final public function __construct()
    {
    }

    public static function fakeBinding(): string|Closure
    {
        return (new static)->getBinding('fake');
    }

    public function getBinding(string $adapterName): string|Closure
    {
        switch ($adapterName) {
            case 'getimg':
                return fn () => (new GetimgGenerateImageFactory())->makeFromConfig();
            case 'fake':
                return FakeGenerateImage::class;
            default:
                throw new GenerateImageAdapterCouldNotBeResolved(
                    "The configured adapter '{$adapterName} is not recognized."
                );
        }
    }
}
