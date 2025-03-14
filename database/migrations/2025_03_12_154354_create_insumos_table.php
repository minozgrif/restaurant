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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Ejemplo: "Tomate", "Carne", "Arroz"
            $table->integer('cantidad')->default(0); // Cantidad disponible
            $table->string('unidad')->default('unidad'); // Ejemplo: kg, litros, piezas
            $table->date('fecha_caducidad')->nullable(); // Para productos perecederos
            $table->integer('stock_minimo')->default(5); // Nivel mínimo para alertas
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
        Schema::dropIfExists('insumos');
    }
};
