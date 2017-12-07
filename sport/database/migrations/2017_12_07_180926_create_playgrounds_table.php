<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaygroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playground', function (Blueprint $table) {
            $table->increments('id');
            $table->string('playground_name');
            $table->integer('country');
            $table->string('playground_picture')->nullable();
            $table->integer('nb_supporter_max')->default("40000");

            $table->rememberToken();
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
        Schema::dropIfExists('playground');
    }
}
