<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Member;

class MemberSelectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function build()
    {
        return $this->view('emails.memberSelected')
                    ->with([
                        'item' => $this->member // Assurez-vous que $this->member contient les informations que vous voulez afficher
                    ]);
    }
}
