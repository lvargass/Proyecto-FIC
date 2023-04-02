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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('rubro_id')->constrained('rubros');
            $table->foreignId('comuna_id')->constrained('comunas');
            $table->string('name');
            // Company data
            $table->string('company_name')->nullable();
            $table->string('company_name_fantasy')->nullable();
            $table->text('company_object')->nullable();
            $table->integer('company_capital')->nullable();
            $table->enum('type_currency', [ 'PESOS', 'DOLARES' ])->default('PESOS');
            $table->enum('company_duration', [ 'Indefinida', 'Fecha cierta y sin renovacion', 'Otra' ]);
            $table->enum('administration_for', [ 'El constituyente' ])->default('El constituyente');
            $table->text('administration_powers')->nullable();;
            // Address
            $table->string('street')->nullable();
            $table->string('village')->nullable();
            $table->string('comuna')->nullable();
            $table->string('number')->nullable();
            $table->string('block')->nullable();
            $table->string('department')->nullable();
            $table->string('region')->nullable();
            // General
            $table->enum('status', [ 'PENDIENTE', 'PROCESANDO', 'COMPLETADO' ])->default('PENDIENTE');
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
        Schema::dropIfExists('processes');
    }
};
