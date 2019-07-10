<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('price');
        });

        Schema::create('breed_pack',function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('pack_id')->unsigned();
            $table->bigInteger('breed_id')->unsigned();
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packs');
        Schema::dropIfExists('pack_breed');
    }
}
