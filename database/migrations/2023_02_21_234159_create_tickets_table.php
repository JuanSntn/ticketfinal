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
            $table->id();
            $table->string('autor', 70)->nullable();;
            $table->dateTime('fecha')->nullable()->useCurrent();
            $table->string('clasif', 25)->nullable();
            $table->text('detalles')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estatus', 25)->nullable()->default('pendiente');
            $table->string('cargo', 25)->nullable()->default('nadie');
            $table->unsignedBigInteger('id_departamentos')->nullable()->constrained();;
            $table->unsignedBigInteger('user_id')->nullable()->constrained();;
            $table->foreign('id_departamentos')->references('id')->on('departamentos')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('tickets');
    }
};
