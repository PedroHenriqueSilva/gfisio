<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoulders', function (Blueprint $table) {
            $table->id();
            $table->float('right_flexion');
            $table->float('left_flexion');
            $table->float('right_extension');
            $table->float('left_extension');
            $table->float('right_external_rotation');
            $table->float('left_external_rotation');
            $table->float('right_internal_rotation');
            $table->float('left_internal_rotation');
            $table->float('right_abduction');
            $table->float('left_abduction');
            $table->float('push_right_horizontal_arm');
            $table->float('push_left_horizontal_arm');
            $table->float('push_right_vertical_arm');
            $table->float('push_left_vertical_arm');
            $table->float('right_pull');
            $table->float('left_pull');
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
        Schema::dropIfExists('shoulders');
    }
};
