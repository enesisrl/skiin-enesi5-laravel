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
        Schema::table('acceptances', function (Blueprint $table) {
            //
            $table->after('refundable', function (Blueprint $table) {
                $table->decimal('deposit_amount_1', 10, 2)->nullable();
                $table->decimal('deposit_amount_2', 10, 2)->nullable();
                $table->decimal('deposit_amount_3', 10, 2)->nullable();
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acceptances', function (Blueprint $table) {
            //
            $table->dropColumn('deposit_amount_1');
            $table->dropColumn('deposit_amount_2');
            $table->dropColumn('deposit_amount_3');
        });
    }
};
