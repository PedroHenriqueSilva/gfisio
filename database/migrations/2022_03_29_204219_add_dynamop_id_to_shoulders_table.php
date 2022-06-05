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
        Schema::table('shoulders', function (Blueprint $table) {
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
        Schema::table('shoulders', function (Blueprint $table) {
            $table->foreignId('dynamop_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
};
