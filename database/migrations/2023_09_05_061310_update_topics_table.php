<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->string('slug')->after('title')->index();
            $table->longText('description')->change();
            $table->boolean('active')->after('type')->index();
            $table->timestamp('published_at')->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('active');
            $table->dropColumn('published_at');
            $table->text('description')->change();
        });
    }
};
