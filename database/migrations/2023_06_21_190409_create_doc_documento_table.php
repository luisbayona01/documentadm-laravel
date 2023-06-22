<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDocumentoTable extends Migration
{
    public function up()
    {
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('doc_id');
            $table->string('doc_codigo',45);
            $table->string('doc_nombre', 60);
            $table->string('doc_contenido', 45)->nullable();
            $table->unsignedInteger('doc_id_proceso')->nullable();
            $table->unsignedInteger('doc_id_tipo')->nullable();

            $table->index(["doc_id_proceso"], 'doc_documento_proceso_id');

            $table->index(["doc_id_tipo"], 'doc_documento_tipo_doc_id');
            $table->nullableTimestamps();


            $table->foreign('doc_id_proceso', 'doc_documento_proceso_id')
                ->references('pro_id')->on('pro_proceso')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('doc_id_tipo', 'doc_documento_tipo_doc_id')
                ->references('tip_id')->on('tip_tipo_doc')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('doc_documento');
    }
}
