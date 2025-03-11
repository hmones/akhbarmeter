<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('publisher_scores', function (Blueprint $table) {
            $table->index('publisher_id');
        });
    }

    public function down(): void
    {
        Schema::table('publisher_scores', function (Blueprint $table) {
            $table->dropIndex('publisher_id');
        });
    }
};
