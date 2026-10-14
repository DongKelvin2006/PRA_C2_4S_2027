<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->string('short_link_code', 4)->nullable()->unique();
        });
    }

    public function down(): void
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->dropUnique(['short_link_code']);
            $table->dropColumn('short_link_code');
        });
    }
};
