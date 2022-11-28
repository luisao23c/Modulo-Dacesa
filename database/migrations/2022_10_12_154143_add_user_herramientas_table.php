<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_herramientas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->unsigned()->nullable();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('herramienta')->unsigned()->nullable();
            $table->foreign('herramienta')->references('id')->on('herramientas')->onDelete('cascade');
            $table->integer('cantidad')->nullable();
            $table->integer('asignados')->nullable();
            $table->unsignedBigInteger('obra')->unsigned()->nullable();
            $table->foreign('obra')->references('id')->on('Obras')->onDelete('cascade');
            $table->text('descripcion')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('reporte')->nullable();

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
        Schema::dropIfExists('user_herramientas');

    }
}
