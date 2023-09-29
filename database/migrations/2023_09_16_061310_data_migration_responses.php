<?php

use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Response::truncate();
        $selectQuery = DB::raw("select id, review_id, option_id, comment, anot_text as annotation, created_at, updated_at from cairo_mediameter_responses;");
        collect(DB::select($selectQuery))->chunk(500)->each(function ($chunk) {
            try {
                DB::table('responses')->insert(json_decode($chunk->toJson(), true));
            } catch (Exception $exception) {
                echo str($exception->getMessage())->limit(1000);
            }
        });
    }

    public function down(): void
    {
        Response::truncate();
    }
};
