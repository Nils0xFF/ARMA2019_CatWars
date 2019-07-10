<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('duration')->unsinged();
            $table->integer('reward')->unsinged();
        });

        Schema::create('user_quest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // $table->boolean('completed');

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('quest_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('quest_id')->references('id')->on('quests')->onDelete('cascade');

            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quests');
        Schema::dropIfExists('user_quest');
    }
}
