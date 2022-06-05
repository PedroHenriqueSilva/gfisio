<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionnairesIdToCsiQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csi_questionnaires', function (Blueprint $table) {
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
        Schema::table('csi_questionnaires', function (Blueprint $table) {
            $table->foreignId('questionnaire_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
