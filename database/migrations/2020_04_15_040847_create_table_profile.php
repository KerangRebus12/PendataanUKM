<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim', 4)->unique();
            $table->string('nama', 30);
            $table->string('alamat', 30);
            $table->enum('jenis_kelamin',['L','P']);
            $table->integer('id_prodi')->unsigned();
            $table->string('posisi', 30);
            $table->string('angkatan', 30);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('profile');
    }
}
