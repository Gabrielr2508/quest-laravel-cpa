<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alunos', function(Blueprint $table){
        $table->engine = 'InnoDB';
        $table->increments('id');
        //$table->unsignedInteger('colegiado_id');
        $table->string('curso', 100);
        $table->string('cpf', 11)->unique();
        $table->string('nome', 255);
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
      Schema::dropIfExists('alunos');
    }
}
