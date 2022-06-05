<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDynamopIdToElbowsFistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elbows_fists', function (Blueprint $table) {
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
        Schema::table('elbows_fists', function (Blueprint $table) {
            $table->foreignId('dynamop_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
