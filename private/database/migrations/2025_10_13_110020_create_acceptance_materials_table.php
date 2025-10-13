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
        Schema::create('acceptance_materials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('acceptance_id')->nullable()->index();
            $table->string('article_code')->nullable()->index();
            $table->string('article_description')->nullable()->index();
            $table->date('date_in')->index();
            $table->date('date_out')->index();
            $table->decimal('profit', 10)->nullable();
            $table->json('profit_details')->nullable();
            $table->timestamps();
            $table->softDeletes()->index();

            $table->foreign('acceptance_id')->references('id')->on('acceptances')->onUpdate('RESTRICT')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptance_materials');
    }
};
