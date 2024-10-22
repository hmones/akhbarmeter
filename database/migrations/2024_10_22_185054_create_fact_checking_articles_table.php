<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fact_checking_articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dbid')->unique();
            $table->text('claim_description');
            $table->text('title');
            $table->text('summary');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fact_checking_articles');
    }
};
