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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('sobrenome', 50)->default('---');
            $table->string('cpfCnpj', 50);
            $table->string('dt_nasc', 50)->default('---');
            $table->string('nome_fantasia', 50)->default('---');
            $table->string('tp_pessoa', 10);
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
        Schema::dropIfExists('pessoas');
    }
};
