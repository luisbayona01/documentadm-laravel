<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDocumentoTable extends Migration
{
    public function up()
    {
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proceso_id');
            $table->unsignedInteger('tipo_doc_id');
            $table->string('codigo');
            $table->timestamps();

            $table->foreign('proceso_id')->references('id')->on('pro_proceso');
            $table->foreign('tipo_doc_id')->references('id')->on('tip_tipo_doc');
        });
    }

    public function down()
    {
        Schema::dropIfExists('doc_documento');
    }
}
