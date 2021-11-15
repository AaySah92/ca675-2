<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusinessesCloseTo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses_close_to', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business_id', 22)->nullable(false)->index();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->string('close_to_business_id', 22)->nullable(false)->index();
            $table->foreign('close_to_business_id')->references('id')->on('businesses')->onDelete('cascade');

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
        Schema::dropIfExists('businesses_close_to');
    }
}
