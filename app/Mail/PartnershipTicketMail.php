<?php

namespace App\Mail;

use App\Models\Partnership;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnershipTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $partnership;

    public function __construct(Partnership $partnership)
    {
        $this->partnership = $partnership;
    }

    public function build()
    {
        return $this->subject('Kode Tiket Pengajuan Kerjasama')
            ->view('emails.partnership_ticket')
            ->with([
                'nama' => $this->partnership->nama,
                'kodeTiket' => $this->partnership->kode_tiket,
                'status' => $this->partnership->status,
                'perihal' => $this->partnership->perihal,
                'tanggal' => $this->partnership->created_at->format('d-m-Y H:i'),
            ]);
    }
}
