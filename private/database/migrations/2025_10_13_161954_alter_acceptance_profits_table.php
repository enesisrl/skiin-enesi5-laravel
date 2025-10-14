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
        Schema::table('acceptance_profits', function (Blueprint $table) {
            //
            $table->string('category_description')->nullable()->after('category')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acceptance_profits', function (Blueprint $table) {
            //
            $table->dropColumn('category_description');
        });
    }
};
