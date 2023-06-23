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
            $table->char('placa',10);
            $table->string('modelo',45);
            $table->string('marca',45);
            $table->integer('año');
            $table->string('color',45);
            $table->string('cilindrada',45);
            $table->string('chasis',45);
            $table->string('motor',45);
            $table->unsignedBigInteger('dependencias_id');
 
            $table->foreign('dependencias_id')->references('id')->on('dependencias');
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
