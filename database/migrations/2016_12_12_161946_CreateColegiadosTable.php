<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegiadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('colegiados', function(Blueprint $table){
         $table->increments('id');
         $table->string('nome', 255)->unique();
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
       Schema::dropIfExists('colegiados');
     }
}
