<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormEmail;
use App\Models\Contact;
use App\Models\ContactInfo;

class ContactController extends Controller
{
    // Show contact form and contact info
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('contacts.index', compact('contactInfo'));
    }

    // Store a new contact message
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Save to the database
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        // Send an email to the admin
        Mail::to('info@ctgabuja.com.ng')->queue(new ContactFormEmail($contact));

        // Redirect with a success message
        return redirect()->route('contacts.index')->with('success', 'Thank you for contacting us! We will get in touch with you soon.');
    }

    // Show all contact messages
    public function messages()
    {
        $contacts = Contact::all();
        return view('contacts.messages', compact('contacts'));
    }

    // Show a single contact message
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Show the form for editing contact info
    public function editContactInfo()
    {
        $contactInfo = ContactInfo::first();
        return view('contacts.edit', compact('contactInfo'));
    }

    // Update the contact info
    public function updateContactInfo(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required|email',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'counseling_hours' => 'required|string',
        ]);

        $contactInfo = ContactInfo::first();

        if (!$contactInfo) {
            // Create new ContactInfo if it doesn't exist
            ContactInfo::create($request->all());
        } else {
            // Update existing ContactInfo
            $contactInfo->update($request->all());
        }

        return redirect()->route('contacts.index')->with('success', 'Contact information updated successfully.');
    }

    // Delete the contact info
    public function deleteContactInfo(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact information deleted successfully.');
    }
}
