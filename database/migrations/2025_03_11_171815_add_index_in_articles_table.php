<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->index('publisher_id');
            $table->index('user_id');
            $table->index('type_id');
            $table->index('topic_id');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex('publisher_id');
            $table->dropIndex('user_id');
            $table->dropIndex('type_id');
            $table->dropIndex('topic_id');
        });
    }
};
