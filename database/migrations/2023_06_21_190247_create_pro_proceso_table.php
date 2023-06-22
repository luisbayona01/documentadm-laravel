<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProProcesoTable extends Migration
{
    public function up()
    {
        Schema::create('pro_proceso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('prefijo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pro_proceso');
    }
}
