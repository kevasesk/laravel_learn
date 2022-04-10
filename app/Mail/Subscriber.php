<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Subscriber as SubscriberModel;

class Subscriber extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;

    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        SubscriberModel $subscriber,
        string $type = 'welcome'
    ) {
        $this->subscriber = $subscriber;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('post@example.com', 'Welcome')
            ->view('emails.subscriber.'.$this->type, [
                'subscriber' => $this->subscriber
            ])
            //->attach(storage_path('app/public/'). $this->post->thumbnail)//TODO learn all methods, not only direct path
        ;
    }
}
