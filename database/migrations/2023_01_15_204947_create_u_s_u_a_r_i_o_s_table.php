<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_s_u_a_r_i_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('app');
            $table->string('fn');
            $table->string('gen');
            $table->string('email');
            $table->string('pass');
            $table->string('datos');
            $table->string('Foto');
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
        Schema::dropIfExists('u_s_u_a_r_i_o_s');
    }
};
