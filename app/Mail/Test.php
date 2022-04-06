<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Post;

class Test extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
    //    Post $post
    )
    {
        //$this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('post@example.com', 'Post sender')
            ->view('emails.test')
            //->attach(storage_path('app/public/'). $this->post->thumbnail)//TODO learn all methods, not only direct path
        ;
    }
}
