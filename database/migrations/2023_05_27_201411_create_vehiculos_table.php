<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2023_06_27_201411_create_vehiculos_table.php
            $table->char('placa',9);
            $table->string('clase',45);
            $table->string('marca',45);
            $table->string('tipo_vehiculo',45);
            $table->string('color',45);
            $table->string('combustible_capacidad',45);
            $table->string('motor',45);
            $table->string('chasis',45);
            $table->string('modelo',45);
            $table->string('cilindrada',45);
            $table->string('estado',45);
=======
            $table->char('placa',9)->nullable();
            $table->string('modelo',45)->nullable();
            $table->string('marca',45)->nullable();
            $table->integer('año')->nullable();
            $table->string('color',45)->nullable();
            $table->string('cilindrada',45)->nullable();
            $table->string('chasis',45)->nullable();
            $table->string('motor',45)->nullable();
>>>>>>> 28c9ba3e4fa59a190db3b7933bb417cc0b58c6e0:database/migrations/2023_05_27_201411_create_vehiculos_table.php
            $table->unsignedBigInteger('dependencias_id');
            $table->foreign('dependencias_id')->references('id')->on('dependencias');
            //$table->unsignedBigInteger('conductors_id');
           //$table->foreign('conductors_id')->references('id')->on('conductors');
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
        Schema::dropIfExists('vehiculos');
    }
};
