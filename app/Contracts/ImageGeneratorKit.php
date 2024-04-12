<?php

namespace App\Contracts;

use App\DTOs\GenerateImageData;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

interface ImageGeneratorKit
{
    public function getView(): View;

    /** @return array<string, mixed> */
    public function getViewData(): array;

    public function getShowView(): View;

    /** @return array<string, mixed> */
    public function getShowData(): array;

    public function getAction(): GenerateImage;

    public function getData(): GenerateImageData;

    public function dataFromRequest(Request $request): GenerateImageData;
}
