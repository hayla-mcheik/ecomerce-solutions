<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|max:255',
'project' => 'nullable|string|max:255',
'message' => 'nullable|string',
        ]);
        Mail::to('mcheikhayla26@gmail.com')->send(new ContactFormMail($validated));
        return back()->with('success','Message sent successfully!');
    }
}
