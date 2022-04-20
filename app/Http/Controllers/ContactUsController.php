<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.page.contact-us', ['page' => ['title' => 'Contact Us']]);
    }
    public function send(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha]
        ]);
        $data = $request->all();
        $ticket = new Ticket($data);
        $ticket->save();
        return redirect()->route('contact-us')->with('success', 'Your ticket has been send');

    }
}
