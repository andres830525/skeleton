<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string("nombre", 50)->default('');
            $table->string("descripcion", 250)->default('');
            $table->integer("area_id");
            $table->date('fecha_vigencia');
            $table->integer("tipodoc_id");
            $table->string("estado", 50)->default('');
            $table->integer("version");
            $table->string("urlpdf")->nullable();
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
        Schema::dropIfExists('documentos');
    }
}
