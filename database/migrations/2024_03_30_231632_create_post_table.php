<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authorId');
            $table->foreign('authorId')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('parentId')->references('id')->on('post');
            $table->string('title', 75);
            $table->string('metaTitle', 100);
            $table->string('slug', 100);
            $table->tinyText('summary');
            $table->tinyText('published', 1);
            $table->dateTime('createdAt');
            $table->timestamp('updatedAt');
            $table->timestamp('publishedAt');
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
        Schema::dropIfExists('post');
    }
}
