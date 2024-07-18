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
        Schema::table('prod_fillings', function (Blueprint $table) {
            $table->integer('downtime')->nullable()->change();
            $table->string('foto_awal_dt')->nullable()->change();
            $table->string('foto_akhir_dt')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prod_fillings', function (Blueprint $table) {
            $table->integer('downtime')->nullable(false)->change();
            $table->string('foto_awal_dt')->nullable(false)->change();
            $table->string('foto_akhir_dt')->nullable(false)->change();
        });
    }
};
