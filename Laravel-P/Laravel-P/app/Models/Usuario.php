<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function up()
    {
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido_paterno');
        $table->string('apellido_materno');
        $table->string('calle');
        $table->string('numero_exterior');
        $table->string('numero_interior')->nullable();
        $table->string('colonia');
        $table->string('municipio');
        $table->string('codigo_postal');
        $table->string('telefono');
        $table->string('empresa')->nullable();
        $table->string('tipo_empleado')->nullable();
        $table->enum('rol', ['super administrador', 'administrador', 'empleado', 'usuario cliente']);
        $table->decimal('latitud', 10, 8)->nullable();
        $table->decimal('longitud', 11, 8)->nullable();
        $table->timestamps();
    });
}

}
