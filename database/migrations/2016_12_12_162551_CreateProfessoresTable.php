<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('professores', function(Blueprint $table){
         $table->increments('id');
         $table->string('cpf', 11)->unique();
         $table->string('nome', 255);
         $table->unsignedInteger('colegiado_id');
         $table->string('password');
         $table->rememberToken();
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
       Schema::dropIfExists('professores');
     }
}
