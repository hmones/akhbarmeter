<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('name');
            $table->text('description');
            $table->string('url');
            $table->string('image')->nullable();
            $table->boolean('active')->default(0);
            $table->string('hashtags')->nullable();
            $table->string('title_xpath')->nullable();
            $table->string('content_xpath')->nullable();
            $table->string('image_xpath')->nullable();
            $table->string('author_xpath')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};
