<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('prendas', function (Blueprint $table) {
            $table->string ('nome');
            $table->decimal ('valor_previsto');
            $table->foreignId('user_id')->constrained() ->onDelete('cascade');//chave estrangeira que referencia a tabela users
            // - quando se apaga um user é também apagada a prenda que lhe corresponde.(on delete cascade)
            $table->decimal ('valor_gasto')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prendas', function (Blueprint $table) {
            //
        });
    }
};
