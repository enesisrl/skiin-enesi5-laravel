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
            $table->uuid('id')->primary();
            $table->uuid('acceptance_id')->nullable()->index();
            $table->string('agency')->nullable()->index();
            $table->date('date')->nullable()->index();
            $table->text('description')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('updated_at')->nullable()->index();
            $table->softDeletes()->index();
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
