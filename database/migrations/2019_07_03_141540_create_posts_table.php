<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('pk_post');
            $table->integer('pk_categoies');
            $table->integer('pk_tags')->nullable();
            $table->string('title'); 
              $table->integer('pk_writers');
              $table->string('content');  
              $table->string('pic_content'); 
              $table->string('status'); 
              $table->string('extras')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
