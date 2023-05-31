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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number', 50)->unique();
            $table->char('status');
           
            $table->string('QR')->nullable();

            $table->unsignedBigInteger('mouses_id');
            $table->foreign('mouses_id')->references('id')->on('mouses');

            $table->unsignedBigInteger('ordenadores_id');
            $table->foreign('ordenadores_id')->references('id')->on('ordenadores');

            $table->unsignedBigInteger('keyboards_id');
            $table->foreign('keyboards_id')->references('id')->on('keyboards');

            $table->unsignedBigInteger('monitors_id');
            $table->foreign('monitors_id')->references('id')->on('monitors');

            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
};
