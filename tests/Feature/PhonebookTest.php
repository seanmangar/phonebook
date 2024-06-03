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

    public function it_adds_contact(): void
    {
    }

    public function it_updates_contact(): void
    {
    }

    public function it_deletes_contact(): void
    {
    }

    public function it_searches_contact_by_last_name(): void
    {
    }
}
