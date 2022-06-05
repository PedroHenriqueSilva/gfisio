<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvaliationIdToRedflagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redflags', function (Blueprint $table) {
            $table->foreignId('avaliation_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('redflags', function (Blueprint $table) {
            $table->foreignId('avaliation_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
