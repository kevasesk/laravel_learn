<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecaptchaController extends Controller
{
    public function index()
    {
        return view('recaptcha.form');
    }
    public function sended(Request $request)
    {
        $googleResponse = $request->get('g-recaptcha-response');
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('https://www.google.com/recaptcha/api/siteverify?secret=6Ld1WDsfAAAAAPId6AoGzbHEnMQsAwVSasbFeals&response='.$googleResponse);
        dd($response->body());
    }
}
