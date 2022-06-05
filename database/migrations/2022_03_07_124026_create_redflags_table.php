<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedflagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redflags', function (Blueprint $table) {
            $table->id();
            $table->string('fever');
            $table->text('fever_descr')->nullable();
            $table->string('fallen');
            $table->text('fallen_descr')->nullable();
            $table->string('dizziness');
            $table->text('dizziness_descr')->nullable();
            $table->string('dif_walking');
            $table->text('dif_walking_descr')->nullable();
            $table->string('notura_pain');
            $table->string('notura_pain_descr')->nullable();
            $table->string('stiffness');
            $table->text('stiffness_descr')->nullable();
            $table->string('weight_loss');
            $table->text('weight_loss_descr')->nullable();
            $table->string('faint');
            $table->text('faint_descr')->nullable();
            $table->string('formication');
            $table->text('formication_descr')->nullable();
            $table->string('tiredness');
            $table->text('tiredness_descr')->nullable();
            $table->string('endless_pain');
            $table->text('endless_pain_descr')->nullable();
            $table->string('urinary_dysfunction');
            $table->text('urinary_dysfunction_descr')->nullable();
            $table->string('intestinal_dysfunction');
            $table->text('intestinal_dysfunction_descr')->nullable();
            $table->string('sexual_dysfunction');
            $table->text('sexual_dysfunction_descr')->nullable();
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
        Schema::dropIfExists('redflags');
    }
}
