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
        Schema::create('acceptances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('website_id')->nullable()->index();
            $table->string('barcode', 13)->nullable()->index();
            $table->string('agency')->nullable()->index();
            $table->string('article_1')->nullable()->index();
            $table->string('article_2')->nullable()->index();
            $table->string('article_3')->nullable()->index();
            $table->string('article_1_description')->nullable()->index();
            $table->string('article_2_description')->nullable()->index();
            $table->string('article_3_description')->nullable()->index();
            $table->string('typology_1', 2)->nullable()->index();
            $table->string('typology_2', 2)->nullable()->index();
            $table->string('typology_3', 2)->nullable()->index();
            $table->string('category_1')->nullable()->index();
            $table->string('category_2')->nullable()->index();
            $table->string('category_3')->nullable()->index();
            $table->date('date_in')->nullable()->index('acceptances_data_in_index');
            $table->date('date_out')->nullable()->index('acceptances_data_out_index');
            $table->integer('site_1')->nullable()->index();
            $table->integer('site_2')->nullable()->index();
            $table->integer('site_3')->nullable()->index();
            $table->string('customer')->nullable()->index();
            $table->string('name')->nullable()->index();
            $table->string('identity')->nullable()->index();
            $table->boolean('seasonal')->nullable()->index();
            $table->string('reservation')->nullable()->index();
            $table->decimal('discount', 5)->nullable();
            $table->text('note')->nullable();
            $table->string('height')->nullable()->index();
            $table->string('weight')->nullable()->index();
            $table->string('shoe_measure')->nullable()->index();
            $table->boolean('uo_age')->nullable()->index();
            $table->boolean('free_ride')->nullable()->index();
            $table->integer('total_days')->nullable()->index('acceptances_n_giorni_index');
            $table->boolean('morning')->nullable()->index();
            $table->time('end_time')->nullable()->index();
            $table->string('skier_type', 1)->nullable()->index();
            $table->string('skier_code', 1)->nullable()->index();
            $table->double('z_value')->nullable();
            $table->boolean('insurance')->nullable()->index();
            $table->decimal('insurance_price')->nullable();
            $table->json('price_details')->nullable();
            $table->boolean('refundable')->nullable()->index();

            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptances');
    }
};
