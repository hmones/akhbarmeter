<?php

namespace Tests\Feature;

use App\Models\Translation;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TranslationsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_translate_function_works(): void
    {
        Translation::create([
            'key' => 'test.key',
            'content' => 'Test value',
            'page' => 'Home',
        ]);

        $this->assertEquals('Test value', translate('test.key'));
        $this->assertNotNull(cache('translations')->where('key', 'test.key'));
    }

    public function test_translate_function_works_for_array_values(): void
    {
        Translation::create([
            'key' => 'test.key.first',
            'content' => 'Test first value',
            'page' => 'Home',
        ]);
        Translation::create([
            'key' => 'test.key.second.1',
            'content' => 'Test second value',
            'page' => 'Publisher',
        ]);
        Translation::create([
            'key' => 'test.key.second.2',
            'content' => 'Test sub level value',
            'page' => 'Publisher',
        ]);

        $this->assertEquals([
            'first' => 'Test first value',
            'second' => [
                1 => 'Test second value',
                2 => 'Test sub level value',
            ],
        ], translate('test.key'));
        $this->assertNotNull(cache('translations')->where('key', 'test.key'));
    }

    public function test_new_translations_reset_translation_cache(): void
    {
        Translation::create([
            'key' => 'test.key',
            'content' => 'Test first value',
            'page' => 'Home',
        ]);
        $this->assertEquals('Test first value', translate('test.key'));
        $this->assertNotNull(cache('translations'));
        Translation::create([
            'key' => 'test.key.second',
            'content' => 'Test second value',
            'page' => 'Publisher',
        ]);
        $this->assertNull(cache('translations'));
    }
}
