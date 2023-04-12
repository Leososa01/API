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
    //declaracion de las variables
    {
        Schema::create('forms', function (Blueprint $table) {
            //estas son las tablas que van a aparecer en la base de datos
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('edad');
            $table->string('contrasena');
            $table->string('contrasena_confirmation');
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
        Schema::dropIfExists('forms');
    }
};
