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
        Schema::create('vouchers', function (Blueprint $table) {

            $table->id();

            // Numéro du ticket
            $table->string('ticket_number')->unique();

            // Lot de vouchers
            $table->foreignId('voucher_batch_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Code de connexion
            $table->string('code')->unique();

            // Identifiants
            $table->string('username');

            $table->string('password');

            // Profil Hotspot
            $table->string('profile');

            // État d'utilisation
            $table->boolean('used')->default(false);

            $table->timestamp('used_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};