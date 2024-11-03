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
        Schema::table('clients_credits', function (Blueprint $table) {
            $table->unsignedDecimal('credit_amount_loan', $precision = 7, $scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients_credits', function (Blueprint $table) {
            $table->dropColumn('credit_amount_loan');
        });
    }
};
