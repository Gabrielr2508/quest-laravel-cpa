<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKCoordenadorColegiadoTable extends Migration
{
     public function up()
     {
       Schema::table('colegiados', function ($table){
         $table->foreign('coordenador_id')->references('id')->on('professores')->onDelete('cascade')->onUpdate('cascade');

       });
     }

     public function down()
     {
       Schema::table('colegiados', function(Blueprint $table){
            $table->dropForeign('colegiados_coordenador_id_foreign');
        });
     }
}