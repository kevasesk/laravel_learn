<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendController extends Controller
{
    public function sendText()
    {
        \App\Jobs\SendTextJob::dispatch()->onQueue('text');
    }
}
