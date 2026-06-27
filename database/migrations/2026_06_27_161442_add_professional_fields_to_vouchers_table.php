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
        Schema::table('vouchers', function (Blueprint $table) {

            $table->string('ticket_number')
                  ->unique()
                  ->nullable()
                  ->after('id');

            $table->decimal('price', 10, 2)
                  ->default(0)
                  ->after('profile');

            $table->string('validity')
                  ->nullable()
                  ->after('price');

            $table->string('ssid')
                  ->nullable()
                  ->after('validity');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {

            $table->dropColumn([
                'ticket_number',
                'price',
                'validity',
                'ssid'
            ]);

        });
    }
};