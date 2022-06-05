<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDynamopIdToHipsKneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hips_knees', function (Blueprint $table) {
            $table->foreignId('dynamop_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hips_knees', function (Blueprint $table) {
            $table->foreignId('dynamop_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
