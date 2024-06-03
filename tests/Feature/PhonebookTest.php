<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhonebookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function it_gets_phonebook(): void
    {
        $response = $this->get('/phonebook');

        $response->assertStatus(200);
    }
}
