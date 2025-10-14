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
        Schema::create('acceptance_profits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('acceptance_id')->nullable()->index();
            $table->string('category')->nullable()->index();
            $table->string('article_code')->nullable()->index();
            $table->string('article_description')->nullable()->index();

            $table->decimal('profit',10,2)->nullable()->index();
            $table->integer('days')->nullable()->index();

            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptance_profits');
    }
};
