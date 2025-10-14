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
            $table->after('category_3',function(Blueprint $table){
                $table->string('category_1_description')->nullable()->index();
                $table->string('category_2_description')->nullable()->index();
                $table->string('category_3_description')->nullable()->index();
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
            $table->dropColumn(['category_1_description','category_2_description','category_3_description']);
        });
    }
};
