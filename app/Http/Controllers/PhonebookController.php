<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PhonebookController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Phonebook/Phonebook');
    }
}
