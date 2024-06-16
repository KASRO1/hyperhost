<?php

namespace App\Console\Commands;

use App\Models\Language;
use Illuminate\Console\Command;

class insertLanguages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-languages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [
            ["id"=>"ru", "icon_path" =>  "/img/flags/ru.png", "name" => "Русский", "active" => true, "default" => true],
            ["id"=>"en","icon_path" =>  "/img/flags/en.png", "name" => "English", "active" => true, "default" => false],
        ];
        foreach ($data as $item) {
            Language::insert($item);
        }
    }
}
