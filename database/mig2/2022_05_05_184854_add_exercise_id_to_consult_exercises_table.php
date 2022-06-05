<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExerciseIdToConsultExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consult_exercises', function (Blueprint $table) {
            $table->foreignId('exercise_id')->constrained(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */ 
    public function down()
    {
        Schema::table('consult_exercises', function (Blueprint $table) {
            $table->foreignId('exercise_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
