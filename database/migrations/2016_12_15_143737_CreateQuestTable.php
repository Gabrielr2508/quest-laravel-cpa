<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('quests', function(Blueprint $table){
        $table->increments('id');
        $table->string('quest1', 1);
        $table->string('quest2', 1);
        $table->string('quest3', 1);
        $table->string('quest4', 1);
        $table->string('quest5', 1);
        $table->string('quest6', 1);
        $table->string('quest7', 1);
        $table->string('quest8', 1);
        $table->string('quest9', 1);
        $table->string('quest10', 1);
        $table->string('quest11', 1);
        $table->string('quest12', 1);
        $table->string('quest13', 1);
        $table->string('quest14', 1);
        $table->string('quest15', 1);
        $table->unsignedInteger('aluno_id');
        $table->unsignedInteger('professor_id');
        $table->unsignedInteger('disciplina_id');
        $table->string('sugestoes', 500);
        $table->string('criticas', 500);
        $table->unsignedInteger('auto_avaliacao');
        $table->timestamps();
      });
    }

    public function down()
    {
      Schema::dropIfExists('quests');
    }
}
