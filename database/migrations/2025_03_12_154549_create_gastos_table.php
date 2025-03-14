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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion'); // Ejemplo: "Compra de carne"
            $table->decimal('monto', 10, 2); // Cantidad de dinero gastado
            $table->date('fecha'); // Fecha del gasto
            $table->string('categoria')->nullable(); // Ejemplo: "Ingredientes", "Servicios", "Mantenimiento"
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
        Schema::dropIfExists('gastos');
    }
};
