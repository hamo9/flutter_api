<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('location');
            $table->string('facebook')->nullable();
            $table->string('profile_img');
            $table->string('cover_img');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('resturants');
    }
}
