<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Post;
use App\Tag;
use App\Objects;
use App\Copy_product;

class copy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copy:product';

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
        $data_copy = Copy_product::select('pk_tags','pk_post')->get();

        foreach ($data_copy as $key => $row_copy) 
        {
            $row_copy['pk_tags'] =   str_replace("[","",$row_copy['pk_tags']);
            $row_copy['pk_tags'] =   str_replace("]","",$row_copy['pk_tags']);
            $row_copy['pk_tags'] =   str_replace('"',"",$row_copy['pk_tags']);

            $row = explode(",",$row_copy['pk_tags']);

            $pk_object = uniqid(); 

            foreach ($row as $key => $value)
             {
                   $new_objects = new Objects();
                   $new_objects->pk_object = $pk_object ;
                   $new_objects->pk_type = 'پست';
                   $new_objects->pk_tag = $value ;
                   $new_objects->save();

                  $e = Post::find($row_copy['pk_post']);
                  $e->pk_objects =  $pk_object ;
                  $e->save();

            }
        }

    }
}
