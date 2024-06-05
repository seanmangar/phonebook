<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     */
    public function test_it_lists_contacts(): void
    {
        $response = $this->get('/contacts');

        $response->assertStatus(302);
    }

    public function test_it_gets_create_contact_form(): void
    {
        $response = $this->get(route('contact.create'));

        $response->assertStatus(302);
    }

    public function test_it_gets_edit_contact_form(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->get(route('contact.edit', $contact));

        $response->assertStatus(302);
    }

    public function test_it_updates_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->post(route('contact.update', $contact), [
            'first_name' => 'Changed Name'
        ]);

        $response->assertStatus(302);
        // TODO: test update has been persisted
    }

    public function test_it_deletes_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->delete(route('contact.destroy', $contact));

        $response->assertStatus(302);
    }

    public function test_it_searches_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->post(route('contact.search'), [
            'searchQuery' => 'test'
        ]);

        $response->assertStatus(302);
    }
}
