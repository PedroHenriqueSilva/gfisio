<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHipsKneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hips_knees', function (Blueprint $table) {
            $table->id();
            $table->float('right_hip_extension');
            $table->float('left_hip_extension');
            $table->float('right_hip_flexion');
            $table->float('left_hip_flexion');
            $table->float('right_hip_abduction');
            $table->float('left_hip_abduction');
            $table->float('right_hip_adduction');
            $table->float('left_hip_adduction');
            $table->float('right_knee_flexion');
            $table->float('left_knee_flexion');
            $table->float('right_knee_extension');
            $table->float('left_knee_extension');
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
        Schema::dropIfExists('hips_knees');
    }
}
