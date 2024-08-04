<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TranslationDataMigrationHelper
{
    protected Collection $translations;

    public function __construct(protected string $modelType)
    {
        $this->translations = DB::table('rainlab_translate_attributes')->where('model_type', $this->modelType)->get();
    }

    public function getEnglishTranslation(int $id, string $field): string
    {
        return json_decode($this->translations->where('model_id', $id)->first()?->attribute_data ?? '')?->$field ?? '';
    }

    public function getTransArray(string $arabic, string $english): string
    {
        return json_encode(['ar' => $arabic, 'en' => $english]);
    }

    public function getTranslatedField(object $record, string $field): string
    {
        return $this->getTransArray($record->$field, $this->getEnglishTranslation($record->id, $field));
    }
}
