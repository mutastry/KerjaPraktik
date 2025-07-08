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
    Schema::table('users', function (Blueprint $table) {
        // Cek apakah kolom 'is_admin' ada sebelum drop
        if (Schema::hasColumn('users', 'is_admin')) {
            $table->dropColumn('is_admin');
        }

        // Tambahkan kolom 'role' hanya jika belum ada
        if (!Schema::hasColumn('users', 'role')) {
            $table->enum('role', ['admin', 'cashier', 'employee', 'owner'])
                  ->nullable()
                  ->after('email');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->boolean('is_admin')->default(false)->after('email');
        });
    }
};