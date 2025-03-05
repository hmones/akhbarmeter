<?php

namespace App\Rules;

use App\Models\Topic;
use Illuminate\Contracts\Validation\Rule;

class TopicSubTypeRule implements Rule
{
    private ?string $type;

    public function __construct(?string $type)
    {
        $this->type = $type;
    }

    public function passes($attribute, $value): bool
    {
        if (!$value) return true;
        if (!$this->type) return false;

        $validSubTypes = [
            'factSheet' => array_filter(array_keys(Topic::SUB_TYPES), fn($key) => str_starts_with($key, 'factSheet')),
            'explainer' => array_filter(array_keys(Topic::SUB_TYPES), fn($key) => str_starts_with($key, 'explainer'))
        ];

        if (!isset($validSubTypes[$this->type])) {
            return $value === null;
        }

        if (!isset(Topic::SUB_TYPES[$value])) {
            return false;
        }

        return in_array($value, $validSubTypes[$this->type]);
    }

    public function message(): string
    {
        return 'Invalid sub-type selected for the given type.';
    }
}
