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
        Schema::create('currency_values', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('currency_id');
            $table->float('currency_value',20, 4, true);
            $table->dateTimeTz('logged_at', 3);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->index(['currency_id', 'logged_at', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_values');

    }
};
