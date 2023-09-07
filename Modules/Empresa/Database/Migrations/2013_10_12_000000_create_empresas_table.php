<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('documento')->unique();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->unique()->default('admin@mail.com');
            $table->smallInteger('is_active')->nullable()->default(0);
            $table->string('logo_empresa', 100)->nullable();
            $table->string('logo_empresa2', 100)->nullable();
            //$table->unsignedBigInteger('plan_id')->default(1)->nullable();
            //$table->foreign('plan_id')->references('id')->on('planes')->restrictOnDelete();


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
        Schema::dropIfExists('empresas');
    }
}
