<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProProcesoTable extends Migration
{
    public function up()
    {
        Schema::create('pro_proceso', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pro_id');
            $table->string('pro_prefijo', 20);
            $table->string('pro_nombre', 60);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pro_proceso');
    }
}
