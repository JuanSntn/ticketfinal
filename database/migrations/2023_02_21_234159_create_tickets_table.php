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
        Schema::create('tickets', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_ticket', true);
            $table->string('autor', 70);
            $table->dateTime('fecha')->nullable()->useCurrent();
            $table->string('clasif', 25)->nullable();
            $table->text('detalles')->nullable();
            $table->string('estatus', 25)->nullable();
            $table->integer('id_departamento')->index('id_departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};