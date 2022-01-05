<?php

namespace App\Mail\Wisatawan;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WisatawanMailDitolak extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('wisatawan.emails.email_ditolak')
            ->with('data', $this->data)
            ->from('adminraung3344mdpl@gmail.com', 'Admin')
            ->subject('Booking Online Mt. Raung 3344 Mdpl');
    }
}
