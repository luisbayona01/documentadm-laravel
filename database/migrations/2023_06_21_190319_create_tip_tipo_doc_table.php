<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipTipoDocTable extends Migration
{
    public function up()
    {
        Schema::create('tip_tipo_doc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('prefijo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tip_tipo_doc');
    }
}
