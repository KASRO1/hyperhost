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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('proc');
            $table->text('opera');
            $table->text('disk');
            $table->text('port');
            $table->text('ip');
            $table->text('virt');
            $table->text('traf');
            $table->text('os');
            $table->text('panel');
            $table->text('price');
            $table->text('link');
            $table->integer('category');
            $table->integer('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
