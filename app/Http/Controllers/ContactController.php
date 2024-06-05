<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index(Request $request): Response
    {
        // (Sean): all contacts passed here for simplicity, but this should be paginated
        return Inertia::render('Contact/ListContacts', [
            'contacts' => Contact::all()
        ]);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Contact/CreateContact');
    }

    public function store(StoreContactRequest $request)
    {
        Contact::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone_num'  => $request->phone_num
        ]);

        return to_route('contact.index');
    }

    public function edit(Contact $contact): Response
    {
        return Inertia::render('Contact/EditContact', [
            'contact' => $contact
        ]);
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone_num'  => $request->phone_num
        ]);

        return to_route('contact.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return to_route('contact.index');
    }

    public function search(Request $request)
    {
        $contacts = Contact::search($request->post('searchQuery'))->get();

        return Inertia::render('Contact/ListContacts', [
            'contacts' => $contacts
        ]);
    }

    public function searchPage(Request $request)
    {
        return redirect()->route('contact.index');
    }
}
