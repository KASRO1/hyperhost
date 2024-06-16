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
        Schema::create('bases', function (Blueprint $table) {
            $table->id();
            $table->text('img');
            $table->text('title');
            $table->text('title_tag');
            $table->text('description');
            $table->text('keywords');
            $table->text('link');
            $table->text('text');
            $table->string('key_title_translate');
            $table->string('key_text_translate');
            $table->integer('category');
            $table->text('date');
            $table->text('views');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bases');
    }
};
