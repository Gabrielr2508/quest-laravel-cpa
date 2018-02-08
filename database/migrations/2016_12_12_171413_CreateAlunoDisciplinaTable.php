<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::enableForeignKeyConstraints();
         Schema::create('alunoDisciplina', function(Blueprint $table){
           //$table->engine = 'InnoDB';
           $table->unsignedInteger('aluno_id');
           $table->unsignedInteger('disciplina_id');

       });


     }


     /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('alunoDisciplina');
     }
}
