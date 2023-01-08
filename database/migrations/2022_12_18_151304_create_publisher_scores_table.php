<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publisher_scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('publisher_id');
            $table->timestamp('from');
            $table->timestamp('to');
            $table->string('period');
            $table->integer('articles_count');
            $table->integer('score_1');
            $table->integer('score_2');
            $table->integer('score_3');
            $table->integer('score');
            $table->integer('rank');
            $table->boolean('is_trending')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publisher_scores');
    }
};
