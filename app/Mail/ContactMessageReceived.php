<?php

namespace App\Mail;

use App\Http\Requests\ContactStoreRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactStoreRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->request->email)
            ->subject($this->request->subject)
            ->replyTo($this->request->email)
            ->markdown('emails.contact.received', [
                'request' => $this->request
            ]);
    }
}
