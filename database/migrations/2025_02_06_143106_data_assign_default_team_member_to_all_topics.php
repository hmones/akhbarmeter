<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $teaMember = DB::table('team_members')->first();
        DB::table('topics')->update(['team_member_id' => $teaMember->id]);
    }
};
