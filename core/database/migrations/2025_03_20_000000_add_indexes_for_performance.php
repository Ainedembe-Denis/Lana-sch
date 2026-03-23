<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('frontends')) {
            try {
                Schema::table('frontends', function (Blueprint $table) {
                    $table->index(['tempname', 'data_keys']);
                });
            } catch (\Throwable $e) {
                // Index may already exist
            }
        }

        if (Schema::hasTable('pages')) {
            try {
                Schema::table('pages', function (Blueprint $table) {
                    $table->index(['tempname', 'is_default']);
                    $table->index('slug');
                });
            } catch (\Throwable $e) {
                // Indexes may already exist
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('frontends')) {
            Schema::table('frontends', function (Blueprint $table) {
                $table->dropIndex(['tempname', 'data_keys']);
            });
        }
        if (Schema::hasTable('pages')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropIndex(['tempname', 'is_default']);
                $table->dropIndex(['slug']);
            });
        }
    }
};
