<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
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

}
