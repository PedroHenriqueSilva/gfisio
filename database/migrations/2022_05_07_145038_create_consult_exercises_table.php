<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultExercisesTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consult_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained()->null();
            $table->foreignId('consult_id')->constrained()->null();
            $table->integer('serie')->null();
            $table->integer('repeat')->null();
            $table->string('execution')->null();
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
        Schema::table('consult_exercises', function (Blueprint $table) {
            $table->foreignId('exercise_id')->constrained()->onDelete('cascade');
            $table->foreignId('consult_id')->constrained()->onDelete('cascade');
            
        }); 
    }
}
