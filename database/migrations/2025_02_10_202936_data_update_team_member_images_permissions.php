<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        $files = Storage::disk(config('filesystems.default'))->allFiles('teamMember');
        foreach ($files as $file) {
            Storage::disk(config('filesystems.default'))->setVisibility($file, 'public');
        }
    }
};
