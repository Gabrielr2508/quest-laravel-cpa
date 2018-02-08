<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyAlunoDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('alunoDisciplina', function ($table){
        $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('alunoDisciplina', function($table)
     {
         //Schema::dropIfExists('alunoDisciplina');
        // $table->dropForeign('alunodisciplina_alunos_id_foreign');
         //$table->dropForeign('alunodisciplina_disciplinas_id_foreign');
          $table->dropForeign('alunodisciplina_aluno_id_foreign');
          $table->dropForeign('alunodisciplina_disciplina_id_foreign');
     });
    }
}
