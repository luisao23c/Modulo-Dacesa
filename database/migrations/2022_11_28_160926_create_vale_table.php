<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vale', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_vale');
            $table->unsignedBigInteger('user_herramientas')->unsigned()->nullable();
            $table->foreign('user_herramientas')->references('id')->on('user_herramientas')->onDelete('cascade');
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
        Schema::dropIfExists('vale');
    }
}
