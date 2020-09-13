<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CreateDirectory_CloudStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CloudStorage:CreateDirectory {Newdirectory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CreateDirectory Into Root CloudStorage ';

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
        $Newdirectory = $this->argument('Newdirectory');
       // Storage::makeDirectory($Newdirectory);
       Storage::makeDirectory('course/'.$Newdirectory);
        return "Directory Create Success";
    }
}
