<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function new(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        $subscriber->sendMail();
        return response()->json(['success' => 'You have been subscribed!']);
    }
}
