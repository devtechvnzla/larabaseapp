<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            $table->id();
            $table->string('code',15);
            $table->string('name');
            $table->smallInteger('status');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id', 'empresaid_fk_6796397')
            ->references('id')
            ->on('empresas')
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
        Schema::dropIfExists('agencias');
    }
}
