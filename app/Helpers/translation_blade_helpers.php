<?php

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

function translate(string $key): string|array
{
    $translations = Cache::rememberForever('translations', fn() => Translation::all()) ?? collect();
    $translation = $translations->filter(fn($value) => str($value->key)->startsWith($key));

    return match ($translation->count()) {
        0 => $key,
        1 => $translation->first()->content,
        default => $translation->pluck('content', 'key')->keyBy(fn ($item, $index) => str($index)->remove($key . '.'))->undot()->toArray()
    };
}
