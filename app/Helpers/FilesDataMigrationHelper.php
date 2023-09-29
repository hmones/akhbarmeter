<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilesDataMigrationHelper
{
    protected Collection $attachments;

    public function __construct(protected string $modelType)
    {
        $this->attachments = DB::table('system_files')->where('attachment_type', $this->modelType)->get();
    }

    public function getFile(int $id, string $field): ?string
    {
        $file = $this->attachments->where('attachment_id', $id)->where('field', $field)->first();

        return $file ? $this->convertKey($file->disk_name) : null;
    }

    protected function convertKey(string $filename): string
    {
        $baseFolder = "uploads/public";
        $firstFolder = Str::of($filename)->substr(0, 3);
        $secondFolder = Str::of($filename)->substr(3, 3);
        $thirdFolder = Str::of($filename)->substr(6, 3);

        return "$baseFolder/$firstFolder/$secondFolder/$thirdFolder/$filename";
    }
}
