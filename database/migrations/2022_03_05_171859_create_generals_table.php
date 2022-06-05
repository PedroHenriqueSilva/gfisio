<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->float('weight');
            $table->float('height');
            $table->float('imc');
            $table->text('job_description');
            $table->text('repeated_movements');
            $table->text('demand_physical_psycho');
            $table->text('worse_clinical_work');
            $table->text('leisure');
            $table->text('physical_activity');
            $table->text('physical_activity_time');
            $table->text('discomfort_physical_activity');
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
        Schema::dropIfExists('generals');
    }
}
