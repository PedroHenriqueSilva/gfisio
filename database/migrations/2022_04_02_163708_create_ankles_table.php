<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnklesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ankles', function (Blueprint $table) {
            $table->id();
            $table->float('right_plantar_flexion');
            $table->float('left_plantar_flexion');
            $table->float('right_dorsiflexion');
            $table->float('left_dorsiflexion');
            $table->float('right_inversion');
            $table->float('left_inversion');
            $table->float('right_eversion');
            $table->float('left_eversion');
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
        Schema::dropIfExists('ankles');
    }
}
