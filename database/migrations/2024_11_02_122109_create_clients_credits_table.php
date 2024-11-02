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
        Schema::create('clients_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_number')->default(1);
            $table->unsignedDecimal('amount', $precision = 5, $scale = 2);
            $table->unsignedTinyInteger('period');
            $table->integer('client_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_credits');
    }
};
