<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function new(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        $subscriber->sendMail();
        return redirect('/');
    }
}
