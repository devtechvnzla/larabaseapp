<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('dpi');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->smallInteger('status');
            $table->unsignedBigInteger('agencia_id')->default(1);
            $table->foreign('agencia_id')
            ->references('id')
            ->on('agencias')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('empresa_id')->default(1);
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('role_id')->default(1);
            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
