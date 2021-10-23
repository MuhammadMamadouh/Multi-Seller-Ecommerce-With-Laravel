<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('weights', function (Blueprint $table) {
         $table->primary('id');
          $table->unsignedBigInteger('category_id')->nullable();
          $table->foreign('category_id')->references('id')->on('main_categories')->onDelete('cascade');
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
      Schema::dropIfExists('weights');
   }
}
