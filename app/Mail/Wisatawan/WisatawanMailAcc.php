<?php

namespace App\Mail\Wisatawan;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WisatawanMailAcc extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->markdown('wisatawan.emails.email_diterima')
            ->with('data', $this->data)
            ->from('adminraung3344mdpl@gmail.com', 'Admin')
            ->subject('Booking Online Mt. Raung 3344 Mdpl');
    }
}
