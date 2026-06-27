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
        Schema::create('routers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('ip');
            $table->integer('api_port')->default(8728);

            $table->string('username');
            $table->string('password');

            $table->boolean('ssl')->default(false);

            $table->string('identity')->nullable();
            $table->string('routeros_version')->nullable();
            $table->string('board_name')->nullable();

            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routers');
    }
};