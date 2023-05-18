<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\ColumnDefinition;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            //when creating a foreign id you need to make sure it is an unsigned big integer
            //because that is the value of the ids in all the other tables
            // $table->unsignedBigInteger('post_id');
            //another way to set up a foreign constraint
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            //another way to set up a foreign constraint
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->timestamps();

            //foreign contraints, if a post  is deleted but there were comments on it we need to delete the comments also.
            //declare the constraint (the post id) that refers to the id column on the post table if this record gets deleted then we should delete the 
            //related comments
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
