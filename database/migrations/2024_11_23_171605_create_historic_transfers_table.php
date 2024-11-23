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
        Schema::create('historic_transfers', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->foreignId('from_wallet_id')->constrained('wallet_owners');
            $table->foreignId('to_wallet_id')->constrained('wallet_owners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historic_transfers');
    }
};
