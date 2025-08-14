<?php

namespace App\Mail;

use App\Models\Partnership;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnershipStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $partnership;

    public function __construct(Partnership $partnership)
    {
        $this->partnership = $partnership;
    }

    public function build()
    {
        return $this->subject('Update Status Partnership')
            ->view('emails.partnership-status');
    }
}
