<?php

namespace App\Mail\Guide;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuideNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $item;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('guide.emails.email')
            ->with('item', $this->item)
            ->subject('Booking Online Mt. Raung 3344 Mdpl');
    }
}
