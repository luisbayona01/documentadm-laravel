<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipTipoDocTable extends Migration
{
    public function up()
    {
        Schema::create('tip_tipo_doc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('tip_id');
            $table->string('tip_nombre', 60);
            $table->string('tip_prefijo', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tip_tipo_doc');
    }
}
