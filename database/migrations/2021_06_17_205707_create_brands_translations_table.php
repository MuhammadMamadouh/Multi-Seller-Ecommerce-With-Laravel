<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('name');
            $table->foreign('brand_id')->references('id')
                ->on('brands')->onDelete('cascade')
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
