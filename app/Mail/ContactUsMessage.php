<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMessage extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;  //data from constructor is stored in $data property of ContactUsMessage Class
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactmail')
        ->with([
                'name' => $this->data['name'],
                'cumessage' => $this->data['cumessage'],
                'ticketid' =>$this->data['ticketid'],
                    ]);    
    
    }
}
