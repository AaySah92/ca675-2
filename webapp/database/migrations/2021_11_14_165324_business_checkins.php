<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusinessCheckins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_checkins', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business_id', 22)->nullable(false)->index();
            $table->enum('count_type', [
                '7_days',
                '14_days',
                '30_days',
                '60_days',
                '90_days',
            ])->nullable(false);
            $table->integer('count')->nullable(false);
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

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
        Schema::dropIfExists('business_checkins');
    }
}
