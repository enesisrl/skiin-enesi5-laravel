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
        Schema::create('receipts', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('acceptance_id', 36)->nullable()->index();
            $table->char('agency_id', 36)->nullable()->index();
            $table->date('date')->nullable()->index();
            $table->text('description')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('updated_at')->nullable()->index();
            $table->softDeletes()->index();
            $table->string('created_by', 36)->nullable()->index('created_by');
            $table->string('updated_by', 36)->nullable()->index('updated_by');
            $table->string('deleted_by', 36)->nullable()->index('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
