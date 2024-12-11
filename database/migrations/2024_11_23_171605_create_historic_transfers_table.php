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
            $table->unsignedBigInteger('from_wallet_id')->nullable();
            $table->string('from_wallet_owner_name');
            $table->unsignedBigInteger('to_wallet_id')->nullable();
            $table->string('to_wallet_owner_name');
            $table->foreignId('system_manager_id')->constrained('users');
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
