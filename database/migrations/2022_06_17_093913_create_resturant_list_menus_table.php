<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantListMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturant_list_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resturant');
            $table->foreign('id_resturant')->references('id')->on('resturants');
            $table->string('menu_img');
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
        Schema::dropIfExists('resturant_list_menus');
    }
}
