<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('origin_country', 45);
            $table->string('appearance', 25);
            $table->string('aroma', 15);
            $table->string('flavor', 20);
            $table->float('alcohol', 3, 1);
            $table->float('ibu', 4, 1);
            $table->tinyInteger('srm');
            $table->string('image', 2048);
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
        Schema::dropIfExists('beers');
    }
}
