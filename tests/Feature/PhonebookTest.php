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
    public function test_it_gets_phonebook(): void
    {
        $response = $this->get('/phonebook');

        $response->assertStatus(200);
    }

    public function test_it_adds_contact(): void
    {
    }

    public function test_it_updates_contact(): void
    {
    }

    public function test_it_deletes_contact(): void
    {
    }

    public function test_it_searches_contact_by_last_name(): void
    {
    }
}
