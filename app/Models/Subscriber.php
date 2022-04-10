<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Mail;
use App\Mail\Subscriber as SubscriberMailer;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email'
    ];

    public function sendMail($type = 'welcome')
    {
        Mail::to($this->email)->send(
            new SubscriberMailer($this, $type)
        );
    }
}
