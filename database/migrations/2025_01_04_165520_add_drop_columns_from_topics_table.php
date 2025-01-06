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
            $table->text('sub_title')->nullable()->after('title');
            $table->json('claim_reference')->nullable()->after('description');
            $table->json('fact_check_reference')->nullable()->after('description');
            $table->text('legal_statement')->nullable()->after('description');
            $table->text('correction_statement')->nullable()->after('description');
            $table->dropColumn('author_name');
            $table->dropColumn('author_avatar');
            $table->dropColumn('image');
        });
    }

    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropColumn('sub_title');
            $table->dropColumn('claim_reference');
            $table->dropColumn('fact_check_reference');
            $table->dropColumn('legal_statement');
            $table->dropColumn('correction_statement');
            $table->dropColumn('team_member_id');
            $table->string('author_name')->nullable();
            $table->string('author_avatar')->nullable();
            $table->string('image')->nullable();
        });
    }
};
