<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->foreign('banner_id')->references('id')
                ->on('banners')->onDelete('cascade')
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
        Schema::dropIfExists('banners_translations');
    }
}
