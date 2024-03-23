<?php

namespace App\Listeners;

use Artisan;
use Illuminate\Console\Events\CommandFinished;

class ArtisanCommandFinished
{
    public function handle(CommandFinished $commandFinished): void
    {
        if(!str_contains('make:model',$commandFinished->command)) return;
        Artisan::call('ide-helper:models -M');
    }
}
