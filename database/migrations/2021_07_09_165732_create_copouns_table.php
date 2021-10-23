<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->string('discount');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->boolean('free_shipping');
            $table->string('quantity');
            $table->enum('discount_type', ['percent', 'fixed']);
            $table->unsignedBigInteger('main_category');
            $table->foreign('main_category')->references('id')
                ->on('main_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->float('minimum_spend');
            $table->float('maximum_spend');
            $table->integer('usage_limit_per_limit');
            $table->integer('usage_limit_per_customer');
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
        Schema::dropIfExists('copouns');
    }
}
