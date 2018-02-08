<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordenadorColegiadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('colegiados', function ($table){
        $table->unsignedInteger('coordenador_id')->nullable();

     });
    }

    public function down()
    {
        Schema::table('colegiados', function(Blueprint $table){
            $table->dropColumn('coordenador_id');
        });
    }
}
