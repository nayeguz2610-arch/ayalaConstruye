<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id('id_obra');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('tipo_obra');
            $table->string('localidad');
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->year('año')->nullable();
            $table->enum('estatus', ['Planeada', 'En proceso', 'Finalizada'])->default('Planeada');
            $table->decimal('presupuesto', 15, 2)->nullable();
            $table->string('contratista')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->unsignedBigInteger('usuario_creador');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamps();


            
            $table->foreign('usuario_creador')->references('id_usuario')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
