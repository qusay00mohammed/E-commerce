<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
      $table->string('comment');
      $table->tinyInteger('status')->default(0);
      $table->timestamps();
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->unsignedBigInteger('item_id');
      $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
