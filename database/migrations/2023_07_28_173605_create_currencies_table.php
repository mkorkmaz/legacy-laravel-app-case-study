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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('long_name');
            $table->string('currencyCode', 3)->unique(); // ISO 4217 currency code
            $table->string('symbol', 3);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->index(['currency_code', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
