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
            $table->unsignedDecimal('monthly_interest', $precision = 7, $scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients_credits', function (Blueprint $table) {
            $table->dropColumn('monthly_interest');
        });
    }
};
