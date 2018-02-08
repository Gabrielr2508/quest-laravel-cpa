<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('disciplinas', function ($table){
         $table->foreign('colegiado_id')->references('id')->on('colegiados')->onDelete('cascade')->onUpdate('cascade');
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
       //Schema::dropIfExists('disciplinas');
       Schema::table('disciplinas', function ($table){
          $table->dropForeign('disciplinas_colegiado_id_foreign');
          $table->dropForeign('disciplinas_professor_id_foreign');
       });
         // $table->dropForeign('alunodisciplina_alunos_id_foreign');
          //$table->dropForeign('alunodisciplina_disciplinas_id_foreign');

     }
}
