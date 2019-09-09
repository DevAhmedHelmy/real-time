<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('replies', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->text('body');

         $table->unsignedBigInteger('question_id')->unsigned();
         $table->unsignedBigInteger('user_id')->unsigned();

         $table->timestamps();




     });

     Schema::table('replies', function (Blueprint $table) {
         $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::dropIfExists('replies');
    }
}
