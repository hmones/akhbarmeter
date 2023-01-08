<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->string('author')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('active')->default(0);
            $table->bigInteger('publisher_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('type_id')->nullable();
            $table->bigInteger('topic_id')->nullable();
            $table->boolean('is_fake')->default(0);
            $table->timestamp('score_at')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
