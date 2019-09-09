<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('questions', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('title');
         $table->string('slug');
         $table->text('body');
         $table->timestamps();

         $table->unsignedBigInteger('category_id');
         $table->unsignedBigInteger('user_id');


     });
     Schema::table('questions', function (Blueprint $table) {
         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
