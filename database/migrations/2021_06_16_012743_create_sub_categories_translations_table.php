<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('name');
            $table->foreign('sub_category_id')->references('id')
                ->on('sub_categories')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('lang_id')->references('id')
                ->on('languages')->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories_translations');
    }
}
