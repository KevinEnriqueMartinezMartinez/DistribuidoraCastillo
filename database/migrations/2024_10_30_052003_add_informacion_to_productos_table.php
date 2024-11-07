<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformacionToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_categoria')->after('precio');
            $table->unsignedBigInteger('id_proveedor')->after('id_categoria');
            $table->unsignedBigInteger('id_bodega')->after('id_proveedor');
            $table->double('cantidad')->after('id_bodega');
            $table->double('precio_total')->after('cantidad');
           


            // Relación con la tabla categorias
            $table->foreign('id_categoria')->references('id')->on('cat?product');
            // Relación con la tabla proveedores
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            // Relación con la tabla bodegas
            $table->foreign('id_bodega')->references('id')->on('bodegas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->dropForeign(['id_categoria']);
            $table->dropForeign(['id_proveedor']);
            $table->dropForeign(['id_bodega']);
        });
        Schema::table('productos', function (Blueprint $table) {
            //
        });
    }
}
