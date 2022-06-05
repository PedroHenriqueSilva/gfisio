<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasts', function (Blueprint $table) {
            $table->id();
            $table->string('drink');
            $table->text('drink_descr')->nullable();

            $table->string('smoke');
            $table->text('smoke_descr')->nullable();

            $table->string('diabetes');
            $table->text('diabetes_descr')->nullable();

            $table->string('has');
            $table->text('has_descr')->nullable();

            $table->string('cholesterol');
            $table->text('cholesterol_descr')->nullable();

            $table->string('heart');
            $table->text('heart_descr')->nullable();
            
            $table->string('pulmonary');
            $table->text('pulmonary_descr')->nullable();

            $table->string('renal');
            $table->text('renal_descr')->nullable();

            $table->string('gastrointestinal');
            $table->text('gastrointestinal_descr')->nullable();

            $table->string('neurological');
            $table->text('neurological_descr')->nullable();

            $table->string('psychological');
            $table->text('psychological_descr')->nullable();

            $table->string('rheumatological');
            $table->text('rheumatological_descr')->nullable();

            $table->string('vascular');
            $table->text('vascular_descr')->nullable();

            $table->string('mammary');
            $table->text('mammary_descr')->nullable();

            $table->string('uterus');
            $table->text('uterus_descr')->nullable();

            $table->string('scrotum');
            $table->text('scrotum_descr')->nullable();

            $table->string('thyroid');
            $table->text('thyroid_descr')->nullable();
            
            $table->string('covid19');
            $table->text('covid19_descr')->nullable();

            $table->string('fracture');
            $table->text('fracture_descr')->nullable();

            $table->string('historical_ca');
            $table->text('hist_ca_descr')->nullable();

            $table->string('hist_family_ca');
            $table->text('hist_family_ca_descr')->nullable();

            $table->string('historical_surgeries');
            $table->text('hist_surgeries_descr')->nullable();

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
        Schema::dropIfExists('pasts');
    }
}
