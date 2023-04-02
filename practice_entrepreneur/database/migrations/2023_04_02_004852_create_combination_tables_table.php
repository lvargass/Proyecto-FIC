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
        Schema::create('combination_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rubro_id')->constrained('rubros');
            $table->foreignId('comuna_id')->constrained('comunas');
            $table->json('list_documents')->nullable();
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
        Schema::dropIfExists('combination_tables');
    }
};
