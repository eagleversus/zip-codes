<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Zipcodesdb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countrys', function(Blueprint $table) {
            $table->increments('idcountrys'); 
            $table->string('namecountrys', 255);
            $table->string('codecountrys', 10); 
            $table->string('initialcountrys', 10);
            $table->timestamps();
        });
        Schema::create('states', function(Blueprint $table) {
            $table->increments('idstates'); 
            $table->string('namestates', 255);
            $table->string('codestates', 10);
            $table->string('initialstates', 10);
            $table->integer('idcountrys')->unsigned();; 
            $table->foreign('idcountrys')->references('idcountrys')->on('countrys'); 
            $table->timestamps();
        });
        Schema::create('citys', function(Blueprint $table) {
            $table->increments('idcitys'); 
            $table->string('namecitys', 255);
            $table->string('codecitys', 10);
            $table->string('initialcitys', 10);
            $table->integer('idstates')->unsigned();; 
            $table->foreign('idstates')->references('idstates')->on('states'); 
            $table->timestamps();
        });
        Schema::create('neighborhoods', function(Blueprint $table) {
            $table->increments('idneighborhoods'); 
            
            $table->string('keyneighborhoods', 10);
            $table->string('codeneighborhoods', 10);
            $table->string('nameneighborhoods', 255);
            $table->string('typeneighborhoods', 255);
            $table->string('zoneneighborhoods', 255);
            $table->integer('idcitys')->unsigned();; 
            $table->foreign('idcitys')->references('idcitys')->on('citys');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
