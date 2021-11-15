<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Businesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function(Blueprint $table) {
            $table->string('id', 22)->nullable(false)->primary();
            $table->string('name', 50)->nullable(false);
            $table->string('city', 50)->nullable(false);
            $table->string('state', 2)->nullable(false);
            $table->string('latitude', 11)->nullable(false);
            $table->string('longitude', 12)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
