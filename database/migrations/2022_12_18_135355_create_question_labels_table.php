<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_labels', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('icon')->default('exclamation');
            $table->string('color')->default('red');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_labels');
    }
};
