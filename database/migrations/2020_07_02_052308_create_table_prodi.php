<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_prodi', 20);
            $table->timestamps();
        });
        // set Fk
        Schema::table('profile', function (Blueprint $table){
            $table->foreign('id_prodi')->references('id')->on('prodi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop FK
        Schema::table('profile', function(Blueprint $table){
            $table->dropForeign('profile_id_prodi_foreign');
        });
        Schema::dropIfExists('prodi');
    }
}
