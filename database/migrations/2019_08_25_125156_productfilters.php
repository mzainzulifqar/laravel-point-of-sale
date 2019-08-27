<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productfilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productfilters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('brand');
            $table->string('price');
            $table->string('ram');
            $table->string('storage');
            $table->string('camera');
            $table->string('image');
            $table->string('quantity');
            $table->string('status');
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
        Schema::dropIfExists('productfilters');
    }
}
