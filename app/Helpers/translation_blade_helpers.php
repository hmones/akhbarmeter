<?php

function translate(string $key): string|array
{
    $translation = cache('translations', collect())->filter(fn ($value) => str($value->key)->startsWith($key));

    return match ($translation->count()) {
        0 => $key,
        1 => $translation->first()->content,
        default => $translation
            ->pluck('content', 'key')
            ->keyBy(fn ($item, $index) => str($index)->remove($key.'.'))
            ->undot()
            ->toArray()
    };
}

function getColorForScore(int $score, string $format = 'tailwindcss'): string
{
    return ($score <= 30) ? COLORS[$format]['red'] : ($score <= 80 ? COLORS[$format]['orange'] : COLORS[$format]['green']);
}

const COLORS = [
    'hex' => [
        'red' => '#EF4444',
        'orange' => '#FBBF24',
        'green' => '#10B981',
    ],
    'tailwindcss' => [
        'red' => 'red-500',
        'orange' => 'orange-500',
        'green' => 'green-500',
    ],
];
