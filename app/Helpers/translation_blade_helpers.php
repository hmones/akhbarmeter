<?php

use Illuminate\Support\Facades\Cache;
use App\Models\Translation;

function translate(string $key): string {
    $translations = Cache::rememberForever('translations', fn() => Translation::all());
    $translation = optional($translations)->where('key', $key)->first();

    return $translation ? $translation->value : $key;
}
