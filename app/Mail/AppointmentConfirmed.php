<?php

namespace App\Mail;

use App\Models\Demand;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $demand;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demand)
    {
        $this->demand = $demand;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('تأكيد موعدك الطبي - SmartSurgery')
                    ->view('emails.appointment_confirmed');
    }
}
