<?php

namespace App\Factories;

use App\Actions\FakeGenerateImageWithSimplePrompt;
use App\Contracts\GenerateImageWithSimplePrompt;
use App\Contracts\ImageGeneratorKit;
use App\DTOs\GenerateImageWithSimplePromptData;
use App\Exceptions\GenerateImageAdapterCouldNotBeResolved;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SimplePromptImageGeneratorKit implements ImageGeneratorKit
{
    protected Request $request;

    protected ?GenerateImageWithSimplePrompt $actionHandler = null;

    /** @var callable */
    protected $getActionAdapter;

    public function __construct(Request $request, string $adapter)
    {
        $this->request = $request;
        $this->getActionAdapter = $this->getActionAdapterConstructor($adapter);
    }

    public function getView(): View
    {
        return view('generate');
    }

    public function getViewData(): array
    {
        return [
            'prompt' => $this->request->has('prompt') ? $this->request->prompt : '',
        ];
    }

    public function getShowView(): View
    {
        return view('show');
    }

    public function getShowData(): array
    {
        $data = $this->request->validate([
            'id' => 'required|string',
            'prompt' => 'sometimes|string',
        ]);

        return [
            'img' => "/storage/images/{$data['id']}.png",
            'prompt' => array_key_exists('prompt', $data) ? $data['prompt'] : 'Unknow prompt.',
        ];
    }

    protected function getActionAdapterConstructor(string $adapterName): callable
    {
        switch ($adapterName) {
            case 'getimg':
                return fn () => (new GetimgGenerateImageWithSimplePromptFactory())->makeFromConfig();
            case 'fake':
                return fn () => new FakeGenerateImageWithSimplePrompt();
            default:
                throw new GenerateImageAdapterCouldNotBeResolved(
                    "The specified adapter '{$adapterName} is not recognized."
                );
        }
    }

    public function getAction(): GenerateImageWithSimplePrompt
    {
        if (! $this->actionHandler) {
            $this->actionHandler = ($this->getActionAdapter)();
        }

        return $this->actionHandler;
    }

    public function dataFromRequest(Request $request): GenerateImageWithSimplePromptData
    {
        $validated = $request->validate(['prompt' => 'required|string']);
        $prompt = $validated['prompt'];
        $id = uniqid();

        return new GenerateImageWithSimplePromptData($prompt, $id);
    }

    public function getData(): GenerateImageWithSimplePromptData
    {
        return $this->dataFromRequest($this->request);
    }
}
