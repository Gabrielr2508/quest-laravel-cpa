<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('professores', function ($table){
         $table->foreign('colegiado_id')->references('id')->on('colegiados')->onDelete('cascade')->onUpdate('cascade');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       ///Schema::dropIfExists('professores');
         // $table->dropForeign('alunodisciplina_alunos_id_foreign');
          //$table->dropForeign('alunodisciplina_disciplinas_id_foreign');
        Schema::table('professores', function ($table){
          $table->dropForeign('professores_colegiado_id_foreign');
       });
     }
}
