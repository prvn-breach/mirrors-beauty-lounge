<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenericMail extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $subject;
    public $body;
    public $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $subject, $body, $attachments)
    {
        $this->template = $template;
        $this->subject = $subject;
        $this->body = $body;
        $this->files = $attachments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =  $this->view($this->template)
            ->subject($this->subject)
            ->with('body', $this->body);
        foreach ($this->files as $file) {
            $mail->attach($file);
        }
        return $mail;
    }
}
