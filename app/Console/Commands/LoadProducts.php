<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LoadProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:products {fileName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'load a JSON file of products';

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
                $product = new Product([
                    'name' => $value['name'],
                    'external_id' => $value['external_id'],
                    'price' => $value['price'],
                    'category_id' => $value['category_id'][0],
                    'quantity' => $value['quantity'],
                    'creation_at' => date('Y-m-d H:i:s'),
                ]);
                $product->save();
            }
        }
    }
}
