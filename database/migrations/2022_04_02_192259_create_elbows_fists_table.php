<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElbowsFistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elbows_fists', function (Blueprint $table) {
            $table->id();
            $table->float('right_elbow_flexion');
            $table->float('left_elbow_flexion');
            $table->float('right_elbow_extension');
            $table->float('left_elbow_extension');
            $table->float('right_fist_flexion');
            $table->float('left_fist_flexion');
            $table->float('right_fist_extension');
            $table->float('left_fist_extension');
            $table->float('right_supination');
            $table->float('left_supination');
            $table->float('right_pronation');
            $table->float('left_pronation');
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
        Schema::dropIfExists('elbows_fists');
    }
}
