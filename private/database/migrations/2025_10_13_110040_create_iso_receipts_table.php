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
        Schema::create('iso_receipts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('website_id')->nullable()->index();
            $table->string('first_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('ski')->nullable()->index();

            $table->string('height')->nullable()->index();
            $table->string('weight')->nullable()->index();
            $table->string('shoe_measure')->nullable()->index();
            $table->boolean('uo_age')->nullable()->index();

            $table->string('skier_type',1)->nullable()->index();
            $table->float('z_value')->nullable();

            $table->timestamps();
            $table->softDeletes()->index();

        });

        Schema::create('iso_rent_receipts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('website_id')->nullable()->index();
            $table->string('name')->nullable()->index();
            $table->string('ski')->nullable()->index();

            $table->string('height')->nullable()->index();
            $table->string('weight')->nullable()->index();
            $table->string('shoe_measure')->nullable()->index();
            $table->boolean('uo_age')->nullable()->index();

            $table->string('skier_type',1)->nullable()->index();
            $table->float('z_value')->nullable();

            $table->timestamps();
            $table->softDeletes()->index();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iso_receipts');
        Schema::dropIfExists('iso_rent_receipts');
    }
};
