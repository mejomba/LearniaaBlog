<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RenameDirectory_CloudStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CloudStorage:RenameDirectory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       
      //  $files =   Storage::allFiles("product");

        // Delete Files
      //  Storage::delete($files);
       // Storage::rename('product', 'package/');

      Storage::remove('product');
   //  Storage::move('product/*', 'package/');
        return "Directory Rename Success";
    }
}
