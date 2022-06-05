<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionnairesIdToAedcQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aedc_questionnaires', function (Blueprint $table) {
            $table->foreignId('questionnaire_id')->constrained(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aedc_questionnaires', function (Blueprint $table) {
            $table->foreignId('questionnaire_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
