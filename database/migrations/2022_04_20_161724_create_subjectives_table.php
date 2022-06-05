<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectives', function (Blueprint $table) {
            $table->id();
            $table->string('subjective_img');
            $table->integer('subjective_scale'); 
            $table->string('subjective_characteristic');
            $table->string('subjective_spatial_location');
            $table->string('subjective_description');
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
        Schema::dropIfExists('subjectives');
    }
}
