<?php

namespace App\Rules;

use App\Models\Publisher;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Contracts\Validation\Rule;

class PublisherUrlRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        $url = new Uri($value);

        return Publisher::where('url', 'like', '%' . $url->getHost() . '%')->exists();
    }

    public function message(): string
    {
        return 'Please add this publisher first to our database';
    }
}
