<?php
namespace App\Rules;

use App\Models\Topic;
use Illuminate\Contracts\Validation\Rule;

class FakeNewsBadgeRule implements Rule
{
    private string|null $type;

    public function __construct(?string $type)
    {
        $this->type = $type;
    }

    public function passes($attribute, $value): bool
    {
        if ($this->type === 'fakeNews') {
            return !empty($value) && array_key_exists($value, Topic::FAKE_NEWS_BADGES);
        }

        return is_null($value);
    }

    public function message(): string
    {
        if ($this->type === 'fakeNews') {
            return 'The fake news badge field is required when type is Fake News and must be valid.';
        }

        return 'The fake news badge must be null when type is not Fake News.';
    }
}
