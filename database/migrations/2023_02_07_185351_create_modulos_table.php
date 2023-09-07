<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->unsignedBigInteger('agencia_id')->default(1);
            $table->foreign('agencia_id', 'agenciaid_fk_67963967')
            ->references('id')
            ->on('agencias')
            ->onUpdate('cascade')
            ->onDelete('cascade');
             $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id', 'userid_fk_6796684')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
