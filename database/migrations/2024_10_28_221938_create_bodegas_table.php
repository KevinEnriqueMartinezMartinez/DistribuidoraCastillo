<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion');
            //defino la columna que será la llave foranea
            $table->unsignedBigInteger('id_producto')->nullable();
            // Relación con la tabla productos
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::table('bodegas', function (Blueprint $table) {
            //esto elimina la llave foranea antes de eliminar la tabla
            $table->dropForeign(['id_producto']);
        });
        Schema::dropIfExists('bodegas');
    }
}
