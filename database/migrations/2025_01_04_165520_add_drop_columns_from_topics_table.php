<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->unsignedBigInteger('team_member_id')->nullable()->after('id');
            $table->dropColumn('author_name');
            $table->dropColumn('author_avatar');
            $table->dropColumn('image');
        });
    }

    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropColumn('team_member_id');
            $table->string('author_name')->nullable();
            $table->string('author_avatar')->nullable();
            $table->string('image')->nullable();
        });
    }
};
