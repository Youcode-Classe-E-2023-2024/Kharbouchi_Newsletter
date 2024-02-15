<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Member;

class MemberSelectedMail extends Mailable
{
    public $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function build()
    {
        return $this->view('emails.memberSelected')
                    ->with(['item' => $this->member]); // Assurez-vous que la vue utilise 'item' pour afficher les données
    }
}

