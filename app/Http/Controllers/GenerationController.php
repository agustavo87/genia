<?php

namespace App\Http\Controllers;

use App\Contracts\ImageGeneratorKit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GenerationController extends Controller
{
    public function __construct(protected ImageGeneratorKit $kit)
    {
        //
    }

    public function create(): View
    {
        return $this->kit
            ->getView()
            ->with($this->kit->getViewData());
    }

    public function show(): View
    {
        return $this->kit
            ->getShowView()
            ->with($this->kit->getShowData());
    }

    public function generate(): RedirectResponse
    {
        $generateImageData = $this->kit->getData();
        $this->kit->getAction()
            ->handle($generateImageData);

        return redirect()->route(
            'generation.show',
            [
                'id' => $generateImageData->id,
                'prompt' => $generateImageData->prompt,
            ]
        );
    }
}
