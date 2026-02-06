<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Mail\ContactCreatedMail;
use Illuminate\Support\Facades\Mail;


class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("contactsupsert");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();
        
        $contact = Contact::create([
        'name'  => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
    ]);

        Mail::to(config('mail.admin_email'))
            ->send(new ContactCreatedMail($contact));

        return response()->json([
            'message' => 'Контакт успешно отправлен',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
