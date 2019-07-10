<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('max_hp')->unsigned();          //HP
            $table->integer('cuteness')->unsigned();        //DODGE CHANCE 
            $table->integer('fur_thickness')->unsigned();   //DEFENSE
            $table->integer('claw_sharpness')->unsigned();  //ATTACK
            
            $table->bigInteger('rarity_id')->unsigned();
            $table->foreign('rarity_id')->references('id')->on('rarities')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
}
