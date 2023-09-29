<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TareaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea_categoria', function (Blueprint $table) {
            $table->id();
            $table->string('categoria')->unique()->nullable(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tarea_id')->references('id')->on('tarea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea_categoria');
    }
}