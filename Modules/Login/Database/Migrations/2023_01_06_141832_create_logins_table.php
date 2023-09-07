<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->unsignedBigInteger('empresa_id')->default(1);
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->rememberToken();
            $table->string('user_agent');
            $table->string('mes')->defaut(date('m'));
            $table->string('session_token', 40);
            $table->string('ip_address', 40);
            $table->timestamp('login_at')->useCurrent();
            $table->dateTime('logout_at')->nullable();
            $table->string('ciudad')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('logins');
    }
}
