<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->renameColumn('legal_statement', 'conclusion');
            $table->renameColumn('summary', 'chatbot_summary');
        });
    }

    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            //
        });
    }
};
