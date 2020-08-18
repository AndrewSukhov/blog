<?php

namespace App\Console\Commands;

use App\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LoadCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:categories {fileName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'load a JSON file of categories';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fileName = $this->argument('fileName');
        if (Storage::exists($fileName)) {
            $content = json_decode(Storage::get($fileName), true);

            foreach ($content as $value){
                $category = new Category([
                    'name' => $value['name'],
                    'external_id' => $value['external_id'], 
                ]);
                $category->save();
            }
        }
    }
}
