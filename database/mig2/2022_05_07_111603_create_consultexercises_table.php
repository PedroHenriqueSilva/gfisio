<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultexercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultexercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained()->default(0);
            $table->foreignId('consult_id')->constrained()->default(0);
            $table->integer('serie')->default(0);
            $table->integer('repeat')->default(0);
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
        Schema::table('consultexercises', function (Blueprint $table) {
            $table->foreignId('exercise_id')->constrained()->onDelete('cascade');
            $table->foreignId('consult_id')->constrained()->onDelete('cascade');
            
        });
    }
}
