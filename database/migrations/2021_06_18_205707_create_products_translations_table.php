<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('name');
            $table->string('description');
            $table->string('summary');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade')
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
        Schema::dropIfExists('brands_translations');
    }
}
