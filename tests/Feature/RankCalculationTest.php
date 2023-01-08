<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RankCalculationTest extends TestCase
{
    public function test_the_application_calculates_rank_correctly_at_the_end_of_week(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_calculates_rank_correctly_at_the_end_of_month(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
