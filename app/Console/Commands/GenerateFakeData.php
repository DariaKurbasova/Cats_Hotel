<?php

namespace App\Console\Commands;

use App\Models\Room;
use Illuminate\Console\Command;

class GenerateFakeData extends Command
{
    protected $signature = 'data:generate';

    protected $description = 'Генерирует данные для заполнения таблиц';

    public function handle(): void
    {
        Room::factory()->count(10)->create();
    }
}
