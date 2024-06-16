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
        Schema::create('data_centers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('img');
            $table->text('text');
            $table->text('link');
            $table->text('big_img');
            $table->text('city');
            $table->text('en_name');
            $table->text('p_left');
            $table->text('info');
            $table->text('p_top');
            $table->string('key_info_translate');
            $table->string('key_text_translate');
            $table->string('key_title_translate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_centers');
    }
};
