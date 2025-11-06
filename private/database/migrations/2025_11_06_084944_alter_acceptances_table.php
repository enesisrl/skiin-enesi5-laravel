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
            $table->after('category_3_description', function (Blueprint $table) {
                $table->string('brand_1')->nullable()->index();
                $table->string('brand_2')->nullable()->index();
                $table->string('brand_3')->nullable()->index();
                $table->string('measure_1')->nullable()->index();
                $table->string('measure_2')->nullable()->index();
                $table->string('measure_3')->nullable()->index();
                $table->integer('year_1')->nullable()->index();
                $table->integer('year_2')->nullable()->index();
                $table->integer('year_3')->nullable()->index();
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
            $table->dropColumn('brand_1');
            $table->dropColumn('brand_2');
            $table->dropColumn('brand_3');
            $table->dropColumn('measure_1');
            $table->dropColumn('measure_2');
            $table->dropColumn('measure_3');
            $table->dropColumn('year_1');
            $table->dropColumn('year_2');
            $table->dropColumn('year_3');
        });
    }
};
