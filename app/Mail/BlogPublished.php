<?php

namespace App\Mail;

use App\Blog;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogPublished extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $blog;
    protected $user;

    
    public function __construct(Blog $blog, User $user)
    {
        //
        $this->blog = $blog;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject('A New Blog Has Been Posted')
            ->view('emails.newblog')
            ->with([
                'user' => $this->user,
                'blog' => $this->blog
            ]);
        return $this;
    }
}
