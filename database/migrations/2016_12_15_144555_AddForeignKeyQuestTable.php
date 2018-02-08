<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyQuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('quests', function ($table){
         $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade')->onUpdate('cascade');
         $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade')->onUpdate('cascade');
         $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade')->onUpdate('cascade');

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::dropIfExists('quests');
         // $table->dropForeign('alunodisciplina_alunos_id_foreign');
          //$table->dropForeign('alunodisciplina_disciplinas_id_foreign');

     }
}
