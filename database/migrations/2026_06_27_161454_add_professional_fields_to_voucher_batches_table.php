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
        Schema::table('voucher_batches', function (Blueprint $table) {

            $table->string('batch_number')
                  ->unique()
                  ->nullable()
                  ->after('router_id');

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
        Schema::table('voucher_batches', function (Blueprint $table) {

            $table->dropColumn([
                'batch_number',
                'validity',
                'ssid'
            ]);

        });
    }
};