<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('alunos', function ($table){
         //$table->foreign('colegiado_id')->references('id')->on('colegiados')->onDelete('cascade')->onUpdate('cascade');

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('alunos', function ($table){
          //$table->dropForeign('alunos_colegiado_id_foreign');
       });
         // $table->dropForeign('alunodisciplina_alunos_id_foreign');
          //$table->dropForeign('alunodisciplina_disciplinas_id_foreign');

     }
}
