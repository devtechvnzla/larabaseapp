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
        Schema::create('notificacion_usuarios', function (Blueprint $table) {
            $table->id();
            $table->boolean('leido')->default(0);
            $table->unsignedBigInteger('notificacion_id')->default(1);
            $table->foreign('notificacion_id')->references('id')->on('notificaciones')->restrictOnDelete();
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
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
        Schema::dropIfExists('notificacion_usuarios');
    }
};
