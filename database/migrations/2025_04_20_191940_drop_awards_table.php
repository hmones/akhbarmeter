<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('awards');
    }

    public function down(): void
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->timestamps();
        });
    }
};
