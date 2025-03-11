<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->index('review_id');
            $table->index('option_id');
        });
    }

    public function down(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropIndex('review_id');
            $table->dropIndex('option_id');
        });
    }
};
