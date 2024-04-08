<?php

namespace App\Factories;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SimplePromptImageGeneratorFactory
{
    public function __construct(protected Request $request)
    {
        //
    }

    public function getView(): View
    {
        return view('generate', [
            'prompt' => $this->request->has('prompt') ? $this->request->prompt : '',
        ]);
    }
}
