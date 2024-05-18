<?php

namespace App\Console\Commands;

use Http;
use Illuminate\Console\Command;

class GetimgModels extends Command
{
    protected $signature = 'gen:getimg-models';

    protected $description = 'Retrieves available models for GetIMG';

    /**
     * @return void
     */
    public function handle()
    {
        $models = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer '.config('generate.adapters.getimg.key'),
            'content-type' => 'application/json',
        ])->get('https://api.getimg.ai/v1/models', [
            'family' => 'stable-diffusion',
            'pipeline' => 'text-to-image',
        ])->collect();

        $this->info($models->count().' available Stable Difussion models');

        $this->table(
            ['ID', 'Name', 'Author'],
            $models->select('id', 'name', 'author_url')
        );
    }
}
