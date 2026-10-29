<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'sku')) {
                $table->string('sku')->nullable()->unique();
            }
            if (!Schema::hasColumn('products', 'minimum_stock')) {
                $table->integer('minimum_stock')->default(5);
            }
        });
    }

    public function down(): void
    {
    }
};