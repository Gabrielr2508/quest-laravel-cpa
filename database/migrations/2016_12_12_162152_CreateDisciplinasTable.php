<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('disciplinas', function(Blueprint $table){
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->string('codigo', 8);
         $table->string('nome', 255);
         $table->unsignedInteger('colegiado_id');
         $table->unsignedInteger('professor_id');
         $table->string('periodo', 6);
         $table->unique(['codigo', 'professor_id', 'periodo']);
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
       Schema::dropIfExists('disciplinas');
     }
}
