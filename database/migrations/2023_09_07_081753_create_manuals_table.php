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
        Schema::create('manuals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->bigInteger('filesize');
            $table->text('originUrl');
            $table->string('filename')->nullable();
            $table->string('downloadedServer')->nullable();
            $table->timestamps();
            $table->integer('visited')->default(0);
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }
    public function update(): void{
        Schema::table('name', function (Blueprint $table) {
        $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuals');
    }
};
