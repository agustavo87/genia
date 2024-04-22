<?php

namespace App\Contracts;

use App\DTOs\GenerateImageWithSimplePromptData;
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

    public function getAction(): GenerateImageWithSimplePrompt;

    public function getData(): GenerateImageWithSimplePromptData;

    public function dataFromRequest(Request $request): GenerateImageWithSimplePromptData;
}
